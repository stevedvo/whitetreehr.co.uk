# Request the Variables. Can be passed via ENV VARS.
variable "aws_region" {
    default = "eu-west-2"
}

variable "bucket_site" {
    default = "whitetreehr.co.uk"
}

# Specify the provider and access details
provider "aws" {
    region     = "${var.aws_region}"
}

resource "aws_s3_bucket" "b" {
    bucket = "${var.bucket_site}"
    acl = "public-read"
    policy = <<EOF
{
  "Id": "bucket_policy_site",
  "Version": "2012-10-17",
  "Statement": [
    {
      "Sid": "bucket_policy_site_main",
      "Action": [
        "s3:GetObject"
      ],
      "Effect": "Allow",
      "Resource": "arn:aws:s3:::${var.bucket_site}/*",
      "Principal": "*"
    }
  ]
}
EOF

    website {
        index_document = "index.html"
        error_document = "index.html"
    }
}


resource "aws_cloudfront_distribution" "s3_distribution" {
  origin {
    domain_name = "${aws_s3_bucket.b.website_endpoint}"
    origin_id   = "myS3Origin"
    custom_origin_config {
      http_port = "80"
      https_port = "443"
      origin_protocol_policy =  "http-only"
      origin_ssl_protocols = ["TLSv1","TLSv1.1","TLSv1.2"]
    }
  }

  enabled             = true

  comment             = "New Bucket"
  default_root_object = "index.html"

  custom_error_response {
    error_code = "404"
    response_code = "200"
    response_page_path = "/index.html"
  }  

   custom_error_response {
    error_code = "403"
    response_code = "200"
    response_page_path = "/sorry.html"
  }  


  aliases = ["whitetreehr.co.uk"] 

  default_cache_behavior {
    allowed_methods  = ["DELETE", "GET", "HEAD", "OPTIONS", "PATCH", "POST", "PUT"]
    cached_methods   = ["GET", "HEAD"]
    target_origin_id = "myS3Origin"
    compress         = true

    forwarded_values {
      query_string = false

      cookies {
        forward = "none"
      }
    }

    viewer_protocol_policy = "redirect-to-https"
    min_ttl                = 0
    default_ttl            = 3600
    max_ttl                = 86400
  }

  price_class = "PriceClass_200"

  
  restrictions {
    geo_restriction {
      restriction_type = "whitelist"
      locations        = ["GB", "US"]
    }
  }
  
  tags {
    Environment = "production"
  }
  
  viewer_certificate {
    acm_certificate_arn = "arn:aws:acm:us-east-1:696293867939:certificate/0b5d6765-2709-4059-bfe5-6ae673b3a2a2"
    //arn:aws:acm:us-east-1:696293867939:certificate/91d675a3-b875-433e-9bd4-1a3d57b9b8a6
    ssl_support_method = "sni-only"
    minimum_protocol_version = "TLSv1"
  }
}


data "aws_route53_zone" "primary" {
  name = "whitetreehr.co.uk."
}



resource "aws_route53_record" "couk_record" {
  zone_id = "Z17S3X0TUC0ZPV"
  name = "whitetreehr.co.uk"
  type = "A"

  alias {
    name = "${aws_cloudfront_distribution.s3_distribution.domain_name}"
    zone_id = "${aws_cloudfront_distribution.s3_distribution.hosted_zone_id}"
    evaluate_target_health = false
  }
}

resource "aws_route53_record" "www_couk_record" {
  zone_id = "Z17S3X0TUC0ZPV"
  name = "www.whitetreehr.co.uk"
  type = "A"

  alias {
    name = "${aws_cloudfront_distribution.s3_distribution.domain_name}"
    zone_id = "${aws_cloudfront_distribution.s3_distribution.hosted_zone_id}"
    evaluate_target_health = false
  }
}


terraform {
   backend "s3" {
     encrypt = true
     bucket = "whitetreehr-tf-remote-state-storage-s3"
     region = "eu-west-2"
     dynamodb_table = "whitetreehr-tf-state-lock-dynamo"
     key = "state"
   }
}


# create a dynamodb table for locking the state file
resource "aws_dynamodb_table" "dynamodb-terraform-state-lock" {
  name = "whitetreehr-tf-state-lock-dynamo"
  hash_key = "LockID"
  read_capacity = 20
  write_capacity = 20
  
  attribute {
    name = "LockID"
    type = "S"
  }
 
  tags {
    Name = "DynamoDB Terraform State Lock Table"
  }
}



