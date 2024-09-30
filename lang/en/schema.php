<?php

return [
    'organization' => [
        'name' => 'Software Development Services',
        'legal_name' => 'Your legal name',
        'url' => 'https://example.com',
        'description' => 'Description',
        'logo' => 'https://example.com/logo.svg',
        'founding_date' => '2017',
        'founders' => [
            [
                'name' => 'Name Surname',
            ],
        ],
        'address' => [
            'street_address' => 'Address',
            'address_locality' => 'City',
            'postal_code' => '0010',
            'address_country' => 'AM',
        ],
        'contact_point' => [
            'contact_type' => 'customer support',
            'telephone' => '[+374000000]',
            'email' => 'info@example.com',
            'area_served' => 'Global',
            'available_language' => ['English', 'Armenian', 'Russian'],
        ],
        'same_as' => [
            'https://www.facebook.com/...your social name.../',
            'https://www.instagram.com/...your instagram.../',
        ],
        'awards' => [
            'Laravel Certified Company',
            'Top B2B Company in Armenia',
            'Most Reviewed Web Development Company in Armenia',
        ],
        'offerCatalog' => [
            'name' => 'Software Development Services',
            'itemListElement' => [
                'Professional Laravel Developers',
                'Software Development',
                'IT Business Consulting',
                'IT Outsourcing/Outstaffing',
                'UI/UX Design',
                'Custom Software Development',
            ],
        ],
    ],
];
