<!DOCTYPE html>
<html lang="en">

<head>
<!-- -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Laravel</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        html {
            font-size: 62.5%;
        }

        section {
            width: 100vw;
            min-height: 100vh;
            Overflow:hidden;
            Position:relative;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            height: 6rem;
        }

        header .logo {
            display: flex;
            align-items: center;
        }

        header .logo h2 {
            font-size: 2.6rem;
        }

        header .logo img {
            width: 4rem;
            height: 4rem;
        }

        /* header nav {
            
        } */
        header nav ul {
            display: flex;
        }

        header nav ul li {
            list-style-type: none;
            margin-right: 3rem;
        }

        nav ul li {
            font-size: 1.5rem;
        }

        nav ul li a {
            color: black;
        }

        nav ul li a:hover {
            color: rgb(255, 187, 51);
        }

        header .sign-in-btn .btn {
            font-size: 1.5rem;
            border: 2px solid rgb(195, 195, 195);
            color:black;
            border-radius: 1rem;
            padding: 5px 20px;
        }
        header .sign-in-btn{
            Display:flex;
            Align-items:center;
        }
        .sign-in-btn .fa-bars{
            font-size: 3rem;
        margin-left:3rem;
            
        }

        .grid-two {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 2rem;
            padding: 0px 5rem 0px 5rem;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .col-1 {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .col-1 h3 {
            font-size: 1.7rem;
            text-transform: uppercase;
        }

        .col-1 h1 {
            font-size: 5rem;
        }

        .col-1 p {
            font-size: 1.5rem;
            width: 80%;
        }

        .btns {
            /* display: grid;
            grid-template-columns: 1fr 1fr;
            display: inline; */
            display: flex;
            gap: 2rem;
            margin-top: 3rem;

        }

        .btn-1 {
            background-color: rgb(255, 187, 51);
            padding: 0.5rem 1.4rem 0.5rem 1.4rem;
            border-radius: 10px;
            font-size: 1.23rem;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-2 {
            border: 2px solid rgb(195, 195, 195);
            padding: 0.5rem 1.4rem 0.5rem 1.4rem;
            border-radius: 10px;
            font-size: 1.23rem;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .col-2 img {
            width: 100%;
        }

        span {
            color: rgb(255, 187, 51);
        }

        @media only screen and (max-width:800px) {
        html{
                Font-size:42%;
            }
            .grid-two {
                grid-template-columns: 1fr;
            }

            .col-1 {
                grid-row-start: 2;
            }
            header nav ul {
                display:block;
                Position:absolute;
            left:-100%;
            top:6rem; Background:rgba(255,255,255,0.4);
                width:100%;
                height:40vh;
                Text-align:center;
                Backdrop-filter:blur(2rem);
                transition:0.5s ease-in-out;
            }
            nav ul li {
            font-size: 2rem;
            Line-height:50px;  
        }
        .icon{
            Position:relative;
        }
        .btn-1,.btn-2{
            Font-size:2rem;
        }
            
        }
        .text{
            text-align:justify;
            font-size:2rem;
            Padding:2rem;
        }
        .text h1{
            Text-align:center;
        }
        .yt-link{
            color:black;
            Background:rgb(255, 187, 51);
            Width:300px;
            height:30px;
            Position:absolute;
            left:50%;
            Margin-top:10px;
            Transform:translate(-50%);
            Border-radius:20px;
            Display:flex;
            Align-items:center;
            Justify-content:center;
        }
    </style>
</head>

<body>
    <section>
        <header>
            
            <div class="logo">
                <img src="https://i.postimg.cc/7LFgncR4/fox.png" alt="logo">
                <h2>Learner</h2>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#">Teachers</a>
                    </li>
                    <li>
                        <a href="#">Courses</a>
                    </li>
                    <li>
                        <a href="#">Scholorship</a>
                    </li>
                    <li>
                        <a href="#">Pricing</a>
                    </li>
                </ul>
            </nav>
            <div class="sign-in-btn">
                <a href="{{ route('login') }}" class="btn" href="">Login</a>

                <a href="{{ route('register') }}" class="btn" href="">Register</a>
                <div class="icon" onclick="menufun()">
                <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </header>
        <div class="grid-two">
            <div class="col-1">
                <h3>Special offers for first time customers</h3>
                <h1>
                    Learn on your <br> schedule from <br> any device <span><i class="fa-solid fa-arrow-trend-up"></i></span>
                </h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, hic. Facilis nemo aliquam illum rem!
                </p>
                <div class="btns">
                    <a href="#" class="btn-1">Get started</a>
                    <a href="#" class="btn-2">Discover</a>
                </div>
            </div>
            <div class="col-2">
                <img src="https://i.postimg.cc/nVv10FZP/st.jpg" alt="">
            </div>
        </div>
    </section>
    <section class="text">
        <p>
        <h1>Dummy text</h1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <a class="btn-1" href="#">help me to reach  2k subscribe</a>
    </section>

    <script>
        let icon=document.querySelector(".icon");
        let menu=document.querySelector("ul");
        function menufun(){
        if(menu.style.left=="-100%"){
            menu.style.left="0%"
        }else{
            menu.style.left="-100%"
        }
        }
    </script>
</body>

</html>