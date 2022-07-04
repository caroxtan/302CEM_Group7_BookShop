
<html>

<head>
    <title>feedback</title>
    <link rel="stylesheet" href="{{asset('css/feedback.css')}}">

</head>

@include('header')
<?php
echo "<div class='sidenav'>";
		echo "<a href='view_books.php'><font color='black'><b>VIEW BOOKS</b></font></a>";
		echo "<a href='it_books.php'><font color='black'>Information Technology</font></a>";
		echo "<a href='cs_books.php'><font color='black'>Computer Science</font></a>";
	    echo "<a href='maths_books.php'><font color='black'>Mathematics</font></a>";
		echo "<a href='science_books.php'><font color='black'>Science</font></a>";
		echo "<a href='feedback.php'><font color='green'><b>FEEDBACK</b></font></a>";
	echo"</div>";
	echo"<div class='main'>";
		?>

        @if(Session::has('success'))
        <p>{{Session::get('success')}}</p>
        @endif
        @if(Session::has('Fail'))
        <p>{{Session::get('Fail')}}</p>
        @endif
		<h1 align="center">Feedback Form</h1>
        <div class="form-style-5">
            <form method="post" action="{{route('feedback')}}">
             @csrf   
        <br/><br/>
        <div>
            <label for="fname">Name: </label>
            <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Enter your Name">
            <span class="text-danger">@error("name"){{$message}}@enderror</span>
        </div>

        <br/><br/>
        <div>
            <label for="email">Email Address: </label>
            <input type="text" id="email" name="email" value="{{old('email')}}" placeholder="Enter your Email Address">
            <span class="text-danger">@error("email"){{$message}}@enderror</span>
        </div>
        
        <br/>
        <p>What do you think about the service of our book's shop?</p>
        
        <div>
            
            <div class="pic">
                <img src="images/bad.jpg" alt="" width="120px" height="110px" value="bad"> <br/>
                <input type="radio" name="service" value="Bad" id ="1"> Bad
            </div>
            <div class="pic">
                <img src="images/neutral.jpg" alt="" width="110px" height="110px" value="neutral"> <br/>
                <input type="radio" name="service" value="Okay" id ="2"> Okay
            </div>
            <div class="pic">
                <img src="images/good.jpg" alt="" width="110px" height="100px" value="good"> <br/>
                <input type="radio" name="service" value="Good" id="3"> Good
            </div>
        </div>

        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <p><b>Do you have any suggestion for us?</b> </p>
        <textarea name=" suggestion" rows="8" cols="40" placeholder="Enter your suggestion here!"></textarea>
        <span class="text-danger">@error("suggestion"){{$message}}@enderror</span>

        <br/><br/>
         <input type="submit" name="submit" value="Submit Form">
         <input type="hidden" name="submitted" value="true"/>
         
       </form>
     </div></div>


</html>
