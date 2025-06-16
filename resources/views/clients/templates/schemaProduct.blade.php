<script type="application/ld+json">
    {
        "@context": "https://schema.org"
        , "@graph": [{
                "@type": "Organization"
                , "@id": "{{ $settings['site_url'] }}#organization"
                , "name": "{{ $settings['site_name'] }}"
                , "url": "{{ $settings['site_url'] }}"
                , "logo": "{{ $settings['site_url'] }}/assets/img/business/{{ $settings['site_logo'] }}"
                , "email": "{{ $settings['contact_email'] }}"
                , "address": {
                    "@type": "PostalAddress"
                    , "streetAddress": "{{ $settings['contact_address'] }}"
                    , "addressRegion": "{{ $settings['city'] }}"
                    , "postalCode": "{{ $settings['postalCode'] }}"
                    , "addressCountry": "{{ $settings['site_language'] }}"
                }
                , "contactPoint": [{
                    "@type": "ContactPoint"
                    , "telephone": "{{ $settings['contact_phone'] }}"
                    , "contactType": "customer service"
                }]
                , "sameAs": [
                    "{{ $settings['facebook_link'] }}"
                    , "{{ $settings['instagram_link'] }}"
                    , "{{ $settings['discord_link'] }}"
                ]
            }
            , {
                "@type": "WebPage"
                , "@id": "{{ $settings['site_url'] }}#webpage"
                , "url": "{{ $settings['site_url'] }}"
                , "name": "{{ $settings['site_name'] }}"
                , "description": "{{ $settings['site_description'] }}"
                , "inLanguage": "{{ $settings['site_language'] }}"
                , "isPartOf": {
                    "@id": "{{ $settings['site_url'] }}#website"
                }
            }
            , {
                "@type": "BreadcrumbList"
                , "itemListElement": [{
                    "@type": "ListItem"
                    , "position": 1
                    , "item": {
                        "@id": "{{ $settings['site_url'] }}"
                        , "name": "Trang chủ"
                        , "image": "{{ $settings['site_url'] }}/assets/img/banners/{{ $settings['site_banner'] }}"
                    }
                },
                {
                    "@type": "ListItem"
                    , "position": 2
                    , "item": {
                        "@id": "{{ $settings['site_url'] }}"
                        , "name": "Sản phẩm"
                        , "image": "{{ $settings['site_url'] }}/assets/img/banners/{{ $settings['site_banner'] }}"
                    }
                }
                ]
            }
            , {
                "@type": "Product"
                , "@id": "https://haiphongtech.vn/product/bw40-20/#product"
                , "name": "Cảm biến an toàn BW40-20 Autonics"
                , "image": [
                    "https://haiphongtech.vn/wp-content/uploads/2024/04/bw40-20.jpg"
                ]
                , "description": "Cảm biến BW40-20 của Autonics chuyên dùng trong ngành công nghiệp tự động hóa, giúp phát hiện khu vực nguy hiểm."
                , "sku": "BW40-20"
                , "mpn": "BW40-20"
                , "brand": {
                    "@type": "Brand"
                    , "name": "Autonics"
                }
                , "review": {
                    "@type": "Review"
                    , "author": {
                        "@type": "Person"
                        , "name": "Nguyễn Văn A"
                    }
                    , "datePublished": "2024-11-15"
                    , "reviewBody": "Sản phẩm chất lượng, lắp đặt đơn giản, hoạt động ổn định."
                    , "reviewRating": {
                        "@type": "Rating"
                        , "ratingValue": "5"
                        , "bestRating": "5"
                        , "worstRating": "1"
                    }
                }
                , "aggregateRating": {
                    "@type": "AggregateRating"
                    , "ratingValue": "4.9"
                    , "reviewCount": "18" - > Phải khớp với số đánh giá đã đưa vào
                }
                , "offers": {
                    "@type": "Offer"
                    , "url": "https://haiphongtech.vn/product/bw40-20/"
                    , "priceCurrency": "VND"
                    , "price": "890000"
                    , "priceValidUntil": "2025-12-31"
                    , "availability": "https://schema.org/InStock"
                    , "itemCondition": "https://schema.org/NewCondition"
                    , "seller": {
                        "@type": "Organization"
                        , "name": "Hải Phòng Tech"
                    }
                }
            }
            , {
                "@type": "FAQPage"
                , "mainEntity": [{
                        "@type": "Question"
                        , "name": "BW40-20 có thể lắp đặt ngoài trời không?"
                        , "acceptedAnswer": {
                            "@type": "Answer"
                            , "text": "Sản phẩm có thể hoạt động ngoài trời nếu được bảo vệ đúng cách và tránh tiếp xúc nước trực tiếp."
                        }
                    }
                    , {
                        "@type": "Question"
                        , "name": "BW40-20 dùng cho loại máy nào?"
                        , "acceptedAnswer": {
                            "@type": "Answer"
                            , "text": "Phù hợp với máy đóng gói, máy ép, hoặc máy CNC cần đảm bảo an toàn vùng làm việc."
                        }
                    }
                ]
            }
            , {
                "@type": "HowTo"
                , "name": "Cách lắp đặt cảm biến BW40-20"
                , "description": "Hướng dẫn từng bước lắp đặt cảm biến an toàn BW40-20 vào máy công nghiệp."
                , "step": [{
                        "@type": "HowToStep"
                        , "text": "Xác định vị trí lắp cảm biến tại vùng nguy hiểm."
                    }
                    , {
                        "@type": "HowToStep"
                        , "text": "Gắn cảm biến bằng ốc vít vào giá đỡ."
                    }
                    , {
                        "@type": "HowToStep"
                        , "text": "Kết nối dây theo sơ đồ của hãng Autonics."
                    }
                    , {
                        "@type": "HowToStep"
                        , "text": "Kiểm tra hoạt động bằng cách bật thử máy."
                    }
                ]
                , "supply": [{
                        "@type": "HowToSupply"
                        , "name": "Cảm biến BW40-20"
                    }
                    , {
                        "@type": "HowToSupply"
                        , "name": "Tua vít, dây nguồn"
                    }
                ]
            }
            , {
                "@type": "VideoObject"
                , "name": "Giới thiệu cảm biến an toàn BW40-20"
                , "description": "Video giới thiệu sản phẩm BW40-20 từ hãng Autonics."
                , "thumbnailUrl": "https://img.youtube.com/vi/VIDEO_ID/hqdefault.jpg"
                , "uploadDate": "2024-12-10"
                , "contentUrl": "https://haiphongtech.vn/video/bw40-20.mp4"
                , "embedUrl": "https://www.youtube.com/embed/VIDEO_ID"
            }
        ]
    }

</script>
<link rel="canonical" href="https://haiphongtech.vn/product/bw40-20/" />
