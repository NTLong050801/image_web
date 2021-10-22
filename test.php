<!DOCTYPE html>
<html>
 
<head>
    <title>
        How to get the file input by selected file
        name without the path using jQuery?
    </title>
 
    <style>
        h1 {
            color: green;
        }
         
        body {
            text-align: center;
        }
         
        h4 {
            color: purple;
        }
    </style>
    <script src=
"https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
</head>
 
<body>
    <h1>
        GeeksforGeeks
    </h1>
 
    <h3>
        How to get the file input by selected<br>
        file name without the path using jQuery?
    </h3>
 
    <input type="file" id="geeks">
    <h4><!-- Selected file will get here --></h4>
     
    <script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var geekss = e.target.files[0].name;
                alert(geekss + ' is the selected file .');
            });
        });
    </script>
</body>
 
</html>   