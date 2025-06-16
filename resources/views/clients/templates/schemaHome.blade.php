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
                "@type": "WebSite"
                , "@id": "{{ $settings['site_url'] }}#website"
                , "url": "{{ $settings['site_url'] }}"
                , "name": "{{ $settings['site_name'] }}"
                , "publisher": {
                    "@id": "{{ $settings['site_url'] }}#organization"
                }
                , "potentialAction": {
                    "@type": "SearchAction"
                    , "target": "{{ $settings['site_url'] }}/tim-kiem/{q}"
                    , "query-input": "required name=q"
                }
            }
            , {
                "@type": "LocalBusiness"
                , "@id": "{{ $settings['site_url'] }}#localbusiness"
                , "name": "{{ $settings['site_name'] }}"
                , "logo": {
                    "@type": "ImageObject"
                    , "url": "{{ $settings['site_url'] }}/assets/img/business/{{ $settings['site_logo'] }}"
                }
                , 
                , "url": "{{ $settings['site_url'] }}"
                , "telephone": "{{ $settings['contact_phone'] }}"
                , "email": "{{ $settings['contact_email'] }}"
                , "priceRange": "₫₫"
                , "address": {
                    "@type": "PostalAddress"
                    , "streetAddress": "{{ $settings['contact_address'] }}"
                    , "addressLocality": "{{ $settings['city'] }}"
                    , "addressRegion": "{{ $settings['city'] }}"
                    , "postalCode": "{{ $settings['postalCode'] }}"
                    , "addressCountry": "VN"
                }
                "geo": {
                    "@type": "GeoCoordinates"
                    , "latitude": {
                        {
                            $settings['latitude'] ? ? 20.86481
                        }
                    }
                    , "longitude": {
                        {
                            $settings['longitude'] ? ? 106.68345
                        }
                    }
                }
                , "openingHoursSpecification": [{
                    "@type": "OpeningHoursSpecification"
                    , "dayOfWeek": [
                        "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
                    ]
                    , "opens": "08:00"
                    , "closes": "17:30"
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
                }]
            }
        ]
    }

</script>
