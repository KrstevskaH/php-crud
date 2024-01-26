<?php
include("auth_session.php");
include("header.php");

$json_array = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['get_api'])) {
    // API endpoint
    $apiEndpoint = 'http://universities.hipolabs.com/search?country=United+States';

    // Fetch data from the API using cURL
    $curl = curl_init($apiEndpoint);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    // Decode JSON response
    $json_array = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Information</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <form action="api.php" method="POST" enctype="multipart/form-data">
    <button type="submit" name="get_api" class="btn btn-success">
            Get API
        </button>
        <table>
            <thead>
                <tr>
                    <th>University</th>
                    <th>Country Code</th>
                    <th>Country</th>
                    <th>Domain</th>
                    <th>Web Page</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_POST['get_api'])) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://universities.hipolabs.com/search?country=United+States',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'API_KEY: AIzaSyBvoXxD47x6-FrO3UztXKAPwVUlhKne9Qc'
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $json_array = json_decode($response, true);
                foreach ($json_array as $university) {
                    echo "<tr>";
                    echo "<td>" . ($university['name'] ?? '') . "</td>";
                    echo "<td>" . ($university['alpha_two_code'] ?? '') . "</td>";
                    echo "<td>" . ($university['country'] ?? '') . "</td>";
                    echo "<td>" . ($university['domains'][0] ?? '') . "</td>";
                    echo "<td><a href='" . ($university['web_pages'][0] ?? '') . "' target='_blank'>" . ($university['web_pages'][0] ?? '') . "</a></td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
        
    </form>

</body>
</html>
