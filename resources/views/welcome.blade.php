<!doctype html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TEST</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #333;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                max-width: 500px;
                text-align: center;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #cv-table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #cv-table td, #cv-table th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                width: 50%;
            }

            #cv-table tr:nth-child(even){background-color: #f2f2f2;}

            #cv-table a.populate-vote {
                cursor: pointer;
                transition: all .3s ease-in;
            }

            #cv-table a.populate-vote:hover {
                color: darkred;
            }

            #cv-table th {
                padding-top: 12px;
                padding-bottom: 12px;
                background-color: #4CAF50;
                color: white;
            }
        </style>

        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h1>Colors</h1>
                    <p>Click on the Color Name to see how many votes for that color. When you do click on Total, the sum of above numbers will show.</p>
                </div>

                <div class="table">
                    <table id="cv-table">
                        <thead>
                        <tr>
                            <th>Color</th>
                            <th>Vote</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $each_color)
                            <tr>
                                <td><a class="populate-vote" data-color_id="{{ $each_color->id }}">{{ $each_color->name }}</a></td>
                                <td class="votes-{{ $each_color->id }}"></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><a class="populate-vote" data-color_id="all">Total</a></td>
                                <td class="total"></td>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                $("#cv-table .populate-vote").on("click", function () {
                    var color_id = $(this).data("color_id");

                    if (color_id == "all") {
                        var total = 0;
                        $("#cv-table td[class^='votes-']").each(function (index, element) {
                            var each_vote = $(element).text();
                            if (each_vote) {
                                total += parseInt(each_vote);
                            }
                        });

                        $("#cv-table td.total").text(total);
                    } else {
                        $.ajax({
                            type: "post",
                            url: "{{ URL::route('populate-votes') }}",
                            data: { color_id: color_id },
                            success: function(data) {
                                if (data['status'] == 'success') {
                                    var element_str = "#cv-table td.votes-" + color_id;
                                    $(element_str).text(data['count']);
                                    console.log("success!");
                                } else {
                                    console.log("failed!");
                                }
                            }
                        });
                    }
                });
            });
        </script>

    </body>
</html>
