<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
	<title></title>
	<style type="text/css">
		/* Google Font CDN Link */
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
		*{
  			box-sizing: border-box;
  			font-family: "Poppins" , sans-serif;
		}
		body{
			background-color: #3e2093;
		}
		.as{
  			min-height: 100vh;
  			width: 100%;
  			display: flex;
  			align-items: center;
  			justify-content: center;
		}
		.container{
  			background: #fff;
  			border-radius: 6px;
  			padding: 20px 60px 30px 40px;
  			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		}
		.container .content{
  			display: flex;
  			align-items: center;
  			justify-content: space-between;
		}
		.container .content .left-side{
  			width: 25%;
  			height: 100%;
  			display: flex;
  			flex-direction: column;
  			align-items: center;
  			justify-content: center;
 			margin-top: 15px;
  			position: relative;
		}
		.content .left-side::before{
  			content: '';
  			position: absolute;
  			height: 70%;
  			width: 2px;
  			right: -15px;
  			top: 50%;
  			transform: translateY(-50%);
  			background: #afafb6;
		}
		.content .left-side .details{
  			margin: 14px;
  			text-align: center;
		}
		.content .left-side .details i{
  			font-size: 30px;
  			color: #3e2093;
  			margin-bottom: 10px;
		}
		.content .left-side .details .topic{
  			font-size: 18px;
  			font-weight: 500;
		}
		.content .left-side .details .text-one,
		.content .left-side .details .text-three,
		.content .left-side .details .text-two,
		.content .left-side .details .text-four{
  			font-size: 14px;
  			color: #afafb6;
		}
		.container .content .right-side{
 			width: 75%;
  			margin-left: 75px;
		}
		.content .right-side .topic-text{
  			font-size: 23px;
  			font-weight: 600;
		}
		.right-side .input-box{
  			height: 50px;
  			width: 100%;
  			margin: 12px 0;
		}
		.right-side .input-box input,
		.right-side .input-box textarea{
  			height: 100%;
  			width: 100%;
  			border: none;
  			outline: none;
  			font-size: 16px;
  			background: #F0F1F8;
  			border-radius: 6px;
  			padding: 0 15px;
  			resize: none;
		}
		.right-side .message-box{
  			min-height: 110px;
		}
		.right-side .input-box textarea{
  			padding-top: 6px;
		}
		.right-side .button{
  			display: inline-block;
  			margin-top: 12px;
		}
		.right-side .button input[type="button"]{
  			color: #fff;
  			font-size: 18px;
  			outline: none;
  			border: none;
  			padding: 8px 16px;
  			border-radius: 6px;
  			cursor: pointer;
  			transition: all 0.3s ease;
		}
		.button input[type="button"]:hover{
  			background: green;
		}

		@media (max-width: 950px) {
  			.as{
    			width: 90%;
    			padding: 30px 40px 40px 35px ;
  			}
  			.as .content .right-side{
   				width: 75%;
   				margin-left: 55px;
			}
		}
		@media (max-width: 820px) {
  			.as{
    			margin: 40px 0;
    			height: 100%;
  			}
  			.as .content{
    			flex-direction: column-reverse;
  			}
 			.as .content .left-side{
   				width: 100%;
   				flex-direction: row;
   				margin-top: 40px;
   				justify-content: center;
   				flex-wrap: wrap;
 			}
 			.as .content .left-side::before{
   				display: none;
 			}
 			.as .content .right-side{
   				width: 100%;
   				margin-left: 0;
 			}
		}


	</style>
</head>
<body class="bg-success">	
	<a href="{{ url()->previous() }}" style="font-size: 32px;padding-left: 15px;padding-top: 15px;color: white;">
		<i class="fa-solid fa-arrow-left"></i>
	</a>
	<div class="as">
		<section id="contact" class="clean-block features ">
            	<div class="container">
                	<div class="content">
                    	<div class="left-side">
                        	<div class="address details">
                            	<i class="fas fa-map-marker-alt text-success"></i>
                            	<div class="topic">Address</div>
                                <div class="text-one">Jl. H. Jairan No.9, RT.4/RW.9,</div>
                                <div class="text-two">Pakansari,</div>
                                <div class="text-three">Kecamatan Cibinong</div>
                                <div class="text-three">Kabupaten Bogor</div>
                                <div class="text-three">Jawa Barat 16915</div>
                            </div>
                            <div class="phone details">
                                <i class="fas fa-phone-alt text-success"></i>
                                <div class="topic">Phone</div>
                                <div class="text-one">+0098 9893 5647</div>
                                <div class="text-two">+0096 3434 5678</div>
                            </div>
                            <div class="email details">                                    
                                <i class="fas fa-envelope text-success"></i>
                                <div class="topic">Email</div>
                                <div class="text-one">lablingkkabbogor@yahoo.co.id</div>
                                <div class="text-two">lablingkkabbogor@gmail.com</div>
                            </div>
                        </div>
                        <div class="right-side">
                            <div class="topic-text">Contact Us</div>
                            <p style="visibility: hidden;">If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
                            <form action="#">
                                <div class="input-box">
                                    <input type="text" placeholder="Enter your name">
                                </div>
                                <div class="input-box">
                                    <input type="text" placeholder="Enter your email">
                                </div>
                                <div class="input-box message-box">
                                    <textarea placeholder="Enter your messege"></textarea>
                                </div>
                                <div class="button">
                                    <input type="button" class="btn-success" value="Send Now" >
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>