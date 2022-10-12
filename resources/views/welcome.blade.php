<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Qtec Interview Problem 1</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">FILTER SEARCH HISTORY</h1>
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="row">

                        <div class="col">
                            <div>
                                <h4>Time Range</h4>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" name="time_range" value="yesterday" id="yesterday">
                                <label class="form-check-label" for="yesterday"> See data from yesterday</label><br>
                                <input class="form-check-input" type="checkbox" name="time_range" value="last_week" id="last_week">
                                <label class="form-check-label" for="last_week"> See data from last week</label><br>
                                <input class="form-check-input" type="checkbox" name="last_month" value="last_month" id="last_month">
                                <label class="form-check-label" for="last_month"> See data from last month</label>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <h4>Select Date</h4>
                            </div>
                            <div>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="date" placeholder="Start date" title="Start date">
                                    <span class="input-group-text">-</span>
                                    <input class="form-control me-2" type="date" placeholder="End date" title="End Date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <h4>All Keywords</h4>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" name="keyword" value="" id="keyword1">
                                <label class="form-check-label" for="keyword1"> Keyword 1</label>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <h4>All Users</h4>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" name="user" value="" id="user1">
                                <label class="form-check-label" for="user1"> User 1</label>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <h4>IP Addresses</h4>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" name="ip_address" value="" id="ip_address">
                                <label class="form-check-label" for="ip_address"> IP Address 1</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Keyword</th>
                        <th scope="col">Search Result</th>
                        <th scope="col">User</th>
                        <th scope="col">IP</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <script>
        const { createApp } = Vue

        createApp({
            data() {
                return {
                    message: 'Hello Vue!'
                }
            }
        }).mount('#app')
    </script>

</body>
</html>
