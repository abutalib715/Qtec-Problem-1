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
    <div id="app">

        <nav class="navbar navbar-dark bg-dark">
            <h1 class="text-center">FILTER SEARCH HISTORY</h1>
        </nav>
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="row g-0">

                    <div class="col-md-4">
                        <div class="card-header">
                            <div>
                                <h4>Time Range</h4>
                                <input class="form-check-input" type="radio" v-model="form.time_range"
                                       value="yesterday" id="yesterday" style="margin-right: 5px;">
                                <label class="form-check-label" for="yesterday"> See data from yesterday</label><br>
                                <input class="form-check-input" type="radio" v-model="form.time_range"
                                       value="last_week" id="last_week" style="margin-right: 5px;">
                                <label class="form-check-label" for="last_week"> See data from last week</label><br>
                                <input class="form-check-input" type="radio" v-model="form.time_range"
                                       value="last_month" id="last_month" style="margin-right: 5px;">
                                <label class="form-check-label" for="last_month"> See data from last month</label>
                            </div>
                            <div>
                                <h4>Select Date</h4>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="date" v-model="form.start_date" placeholder="Start date" title="Start date">
                                    <span class="input-group-text">-</span>
                                    <input class="form-control me-2" type="date" v-model="form.end_date" placeholder="End date" title="End Date">
                                </div>
                            </div>
                            <div>
                                <h4>All Keywords</h4>
                                <span v-for="keyword in keywords" style="margin-right: 10px;">
                                    <input class="form-check-input" type="checkbox" v-model="form.keywords"
                                           :value="keyword.keyword" :id="keyword.keyword" style="margin-right: 5px;">
                                    <label class="form-check-label" :for="keyword.keyword"> @{{ keyword.keyword }}</label>
                                </span>
                            </div>
                            <div>
                                <h4>All Users</h4>
                                <span v-for="user in users" style="margin-right: 10px;">
                                    <input class="form-check-input" type="checkbox" v-model="form.users"
                                           :value="user.id" :id="'user'+user.id" style="margin-right: 5px;">
                                    <label class="form-check-label" :for="'user'+user.id"> @{{ user.name }}</label>
                                </span>
                            </div>
                            <div>
                                <h4>IP Addresses</h4>
                                <span v-for="ip_address in ip_addresses" style="margin-right: 10px;">
                                    <input class="form-check-input" type="checkbox" v-model="form.ip_addresses"
                                           :value="ip_address.ip_address" :id="ip_address.ip_address" style="margin-right: 5px;">
                                    <label class="form-check-label" :for="ip_address.ip_address"> @{{ ip_address.ip_address }}</label>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
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
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const { createApp } = Vue

        createApp({
            data() {
                return {
                    filter_results: [],
                    keywords: [],
                    users: [],
                    ip_addresses: [],
                    form: {
                        keywords: [],
                        users: [],
                        ip_addresses: [],
                        start_date:'',
                        end_date: '',
                        time_range: ''
                    }
                }
            },
            mounted(){
                this.initializeFiltersData();
            },
            watch: {
                form: function(){

                }
            },
            methods: {
                initializeFiltersData: function (){
                    axios.get('/initialize-filters-data')
                        .then((response) => {
                            this.keywords = response.data.keywords;
                            this.users = response.data.users;
                            this.ip_addresses = response.data.ip_addresses;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
            }
        }).mount('#app')
    </script>

</body>
</html>
