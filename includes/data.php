<?php
$church = [
    'name' => 'Agape Embassy Ministries International',
    'tagline' => 'Loving God, Loving People',
    'address' => 'Along Kendu-Bay - Kadongo Rd (P. O. Box 002 - 40310)',
    'phone' => '+254 729 487 946',
    'email' => 'agapeembassyministriesintl@gmail.com',
    'leaders' => 'Apst Robert Kingstone & Mrs Rev Millicent Kingstone',
    'service_times' => [
        'Sunday Service' => '8:00 AM - 12:00 Noon',
        'Wednesday Midweek Service' => '5:00 PM - 6:00 PM',
        'Friday Campus Fellowship' => '6:30 PM - 8:30 PM',
    ],
];

$ministries = [
    [
        'name' => 'Queens Ministry',
        'summary' => 'Women growing in faith, wisdom, service, and godly leadership.',
    ],
    [
        'name' => 'Kings Ministry',
        'summary' => 'Men pursuing discipleship, responsibility, prayer, and kingdom service.',
    ],
    [
        'name' => 'Youth / Firebrands',
        'summary' => 'A vibrant youth ministry raising bold believers with passion for Christ.',
    ],
    [
        'name' => 'Campus Ministry',
        'summary' => 'Reaching students through fellowship, teaching, worship, and mentorship.',
    ],
    [
        'name' => 'Children Ministry',
        'summary' => 'Helping children know Jesus through Scripture, care, worship, and friendship.',
    ],
    [
        'name' => 'Agape Hand of Mercy',
        'summary' => 'Serving communities through compassion, outreach, and practical support.',
    ],
];

$departments = [
    'Praise & Worship',
    'Technical Team',
    'Media',
    'Ushering',
    'Protocol',
    'Intercessory',
    'Hospitality',
];

$assemblies = [
    'Mawego Assembly - HQ',
    'Ruaraka Assembly',
    'Rakwaro Assembly',
    'Rusinga Assembly',
    'Oyugis Assembly',
    'Kilifi Assembly',
    'Kibra Assembly',
];

$socialLinks = [
    [
        'platform' => 'Facebook',
        'handle' => 'Agape Embassy Ministries International',
        'url' => '#',
    ],
    [
        'platform' => 'YouTube',
        'handle' => 'Agape Embassy Ministries International',
        'url' => '#',
    ],
    [
        'platform' => 'TikTok',
        'handle' => '@agapeembassyministriesintl',
        'url' => '#',
    ],
    [
        'platform' => 'Instagram',
        'handle' => '@agapeembassyministriesintl',
        'url' => '#',
    ],
];

$givingOptions = [
    [
        'name' => 'Offerings',
        'summary' => 'Give your worship offering in support of the ministry and weekly services.',
    ],
    [
        'name' => 'Tithe',
        'summary' => 'Honor God faithfully through tithes and regular kingdom stewardship.',
    ],
    [
        'name' => 'Church Project',
        'summary' => 'Partner with ongoing building, equipment, outreach, and ministry development projects.',
    ],
    [
        'name' => 'Prophetic Giving',
        'summary' => 'Participate in special giving moments led during services, conferences, and gatherings.',
    ],
    [
        'name' => 'Love Offering',
        'summary' => 'Sow a personal gift of honor, appreciation, and support.',
    ],
    [
        'name' => 'Organisation Donation',
        'summary' => 'Support Agape Embassy Ministries International through general donations.',
    ],
];

$events = [
    [
        'date' => 'August 2026',
        'title' => 'Youth Conference',
        'time' => 'Details to be announced',
        'location' => 'Agape Embassy Ministries International',
    ],
    [
        'date' => 'November 2026',
        'title' => 'Mt Zion Annual Conference 2026',
        'time' => 'Details to be announced',
        'location' => 'Agape Embassy Ministries International',
    ],
];

$sermons = [
    [
        'title' => 'Loving God, Loving People',
        'speaker' => 'Apst Robert Kingstone',
        'scripture' => 'Matthew 22:37-39',
        'date' => 'Latest Message',
    ],
    [
        'title' => 'A House of Prayer',
        'speaker' => 'Mrs Rev Millicent Kingstone',
        'scripture' => 'Isaiah 56:7',
        'date' => 'Featured Message',
    ],
    [
        'title' => 'The Fire of Fellowship',
        'speaker' => 'Agape Embassy Teaching Team',
        'scripture' => 'Acts 2:42-47',
        'date' => 'Campus Fellowship',
    ],
];

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
