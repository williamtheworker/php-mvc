<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP MVC</title>
        <style>
            .box {
                display: block;
                margin: 10px;
            }

            .indent {
                padding: 5px;
                margin-left: 30px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="main">
            <div class="box">
                <label for="strategy-label">Select a Strategy:</label>
                <div class="indent">
                    <select name="select_strategy" id="select_strategy">
                        <option value="bubble">Bubble Sort</option>
                        <option value="merge">Merge Sort</option>
                    </select>
                </div>
            </div>

            <div class="box">
                <label for="textbox-label">Text to Sort:</label>
                <div class="indent">
                    <textarea id="textbox" name="textbox" rows="4" cols="50"></textarea>
                </div>
            </div>

            <div class="box">
                <button type="button" class="sort-btn">Sort</button>
            </div>

            <div class="box">
                <label for="result-label">Result:</label>
                <div class="indent">
                    <div id="result"></div>
                </div>
            </div>
        </div>

        <script>
            const baseUrl = window.location.origin + '/php-mvc/public/';

            $(document).ready(() => {
                $('.sort-btn').click(() => {
                    if($('#textbox').val() == '') {
                        alert('Please fill-up the textbox');
                    } else {
                        $.ajax({
                            type: "POST",
                            url: baseUrl+'sorters/sort_data',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                'strategy': $('#select_strategy').val(),
                                'text': $('#textbox').val()
                            },
                            success: function(data) {
                                let result = JSON.parse(data).result;
    
                                $('#result').html(result);
                                console.log('this is the success', result);
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>