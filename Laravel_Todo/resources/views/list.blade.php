<!-- resources/views/hello2.blade.php-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Danh sách công việc</title>
    <link rel="stylesheet" href="">
</head>
<body>



@if ($list === 0)
    Chưa làm
@elseif ($list < 0)
   Đã hoàn thành
@else
    Không thực hiện
@endif
 
 @foreach($list as $lists) 
 {{$lists }}


 @endforeach

</body>
</html>