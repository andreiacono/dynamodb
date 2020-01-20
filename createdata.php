<?php

    // Date now needs to be set.
    date_default_timezone_set('Europe/London');

    // Find out what the issues are here:
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);

    require '/var/www/html/vendor/autoload.php';
    use Aws\DynamoDb\DynamoDbClient;

    $client = DynamoDbClient::factory(array(
        'region' => 'us-east-1', 
        'version' => '2012-08-10' 
    ));

    # Setup some local variables for dates

    date_default_timezone_set('UTC');

    $oneDayAgo = date('Y-m-d H:i:s', strtotime('-1 days'));
    $sevenDaysAgo = date('Y-m-d H:i:s', strtotime('-7 days'));
    $fourteenDaysAgo = date('Y-m-d H:i:s', strtotime('-14 days'));
    $twentyOneDaysAgo = date('Y-m-d H:i:s', strtotime('-21 days'));

    $tableName = 'ProductCatalog';
    echo "Adding data to the $tableName table..." . PHP_EOL;

    $response = $client->batchWriteItem(array(
        'RequestItems' => array(
            $tableName => array(
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '101'),
                            'Title'           => array('S' => 'Book1'),
                            'ISBN'            => array('S' => '111-1111111111'),
                            'Authors'         => array('SS' => array('Author1')),
                            'Price'           => array('N' => '2'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 0.5'),
                            'PageCount'       => array('N' => '500'),
                            'InPublication'   => array('N' => '1'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '102'),
                            'Title'           => array('S' => 'Book2'),
                            'ISBN'            => array('S' => '222-2222222222'),
                            'Authors'         => array('SS' => array('Author1', 'Author2')),
                            'Price'           => array('N' => '20'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 0.8'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '1'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '103'),
                            'Title'           => array('S' => 'Book3'),
                            'ISBN'            => array('S' => '333-3333333333'),
                            'Authors'         => array('SS' => array('Author1', 'Author3')),
                            'Price'           => array('N' => '2000'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 1.5'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '0'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '104'),
                            'Title'           => array('S' => 'Book4'),
                            'ISBN'            => array('S' => '444-4444444444'),
                            'Authors'         => array('SS' => array('Author1', 'Author3')),
                            'Price'           => array('N' => '2000'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 1.5'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '0'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '105'),
                            'Title'           => array('S' => 'Book5'),
                            'ISBN'            => array('S' => '555-5555555555'),
                            'Authors'         => array('SS' => array('Author1', 'Author4')),
                            'Price'           => array('N' => '2000'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 1.5'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '0'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '106'),
                            'Title'           => array('S' => 'Book6'),
                            'ISBN'            => array('S' => '666-6666666666'),
                            'Authors'         => array('SS' => array('Author1', 'Author2')),
                            'Price'           => array('N' => '2000'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 1.5'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '0'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '107'),
                            'Title'           => array('S' => 'Book7'),
                            'ISBN'            => array('S' => '777-7777777777'),
                            'Authors'         => array('SS' => array('Author1', 'Author8')),
                            'Price'           => array('N' => '2000'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 1.5'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '0'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    ),
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'              => array('N' => '108'),
                            'Title'           => array('S' => 'Book8'),
                            'ISBN'            => array('S' => '888-8888888888'),
                            'Authors'         => array('SS' => array('Author1', 'Author5')),
                            'Price'           => array('N' => '2000'),
                            'Dimensions'      => array('S' => '8.5 x 11.0 x 1.5'),
                            'PageCount'       => array('N' => '600'),
                            'InPublication'   => array('N' => '0'),
                            'ProductCategory' => array('S' => 'Book')
                        )
                    )
                )
            ),
        ),
    ));

    echo "done." . PHP_EOL;



    $tableName = 'Forum';
    echo "Adding data to the $tableName table..." . PHP_EOL;

    $response = $client->batchWriteItem(array(
        'RequestItems' => array(
            $tableName => array(
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Name'     => array('S' => 'Amazon DynamoDB'),
                            'Category' => array('S' => 'Amazon Web Services'),
                            'Threads'  => array('N' => '0'),
                            'Messages' => array('N' => '0'),
                            'Views'    => array('N' => '1000')
                        )
                    )
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Name'     => array('S' => 'Amazon S3'),
                            'Category' => array('S' => 'Amazon Web Services'),
                            'Threads'  => array('N' => '0')
                        )
                    )
                ),
            )
        )
    ));

    echo "done." . PHP_EOL;


    $tableName = 'Reply';
    echo "Adding data to the $tableName table..." . PHP_EOL;

    $response = $client->batchWriteItem(array(
        'RequestItems' => array(
            $tableName => array(
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'            => array('S' => 'Amazon DynamoDB#DynamoDB Thread 1'),
                            'ReplyDateTime' => array('S' => $fourteenDaysAgo),
                            'Message'       => array('S' => 'DynamoDB Thread 1 Reply 2 text'),
                            'PostedBy'      => array('S' => 'User B')
                        )
                    )
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'            => array('S' => 'Amazon DynamoDB#DynamoDB Thread 2'),
                            'ReplyDateTime' => array('S' => $twentyOneDaysAgo),
                            'Message'       => array('S' => 'DynamoDB Thread 2 Reply 3 text'),
                            'PostedBy'      => array('S' => 'User B')
                        )
                    )
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'            => array('S' => 'Amazon DynamoDB#DynamoDB Thread 2'),
                            'ReplyDateTime' => array('S' => $sevenDaysAgo),
                            'Message'       => array('S' => 'DynamoDB Thread 2 Reply 2 text'),
                            'PostedBy'      => array('S' => 'User A')
                        )
                    )
                ),
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'            => array('S' => 'Amazon DynamoDB#DynamoDB Thread 2'),
                            'ReplyDateTime' => array('S' => $oneDayAgo),
                            'Message'       => array('S' => 'DynamoDB Thread 2 Reply 1 text'),
                            'PostedBy'      => array('S' => 'User A')
                        )
                    )
                )
            ),
        )
    ));

    echo "done." . PHP_EOL;
