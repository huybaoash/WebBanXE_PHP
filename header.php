<html>
<head>
<title><tiles:getAsString name="title" /></title>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .search-form .form-group {
            float: right !important;
            transition: all 0.35s, border-radius 0s;
            width: 32px;
            height: 32px;
            background-color: #fff;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            border-radius: 25px;
            border: 1px solid #ccc;
        }
        .search-form .form-group input.form-control {
            padding-right: 20px;
            border: 0 none;
            background: transparent;
            box-shadow: none;
            display: block;
        }
        .search-form .form-group input.form-control::-webkit-input-placeholder {
            display: none;
        }
        .search-form .form-group input.form-control:-moz-placeholder {
            /* Firefox 18- */
            display: none;
        }
        .search-form .form-group input.form-control::-moz-placeholder {
            /* Firefox 19+ */
            display: none;
        }
        .search-form .form-group input.form-control:-ms-input-placeholder {
            display: none;
        }
        .search-form .form-group:hover,
        .search-form .form-group.hover {
            width: 50%;
            border-radius: 4px 25px 25px 4px;
        }
        .search-form .form-group span.form-control-feedback {
            position: absolute;
            top: -1px;
            right: -2px;
            z-index: 2;
            display: block;
            width: 34px;
            width: 34px;
            height: 34px;
            line-height: 34px;
            text-align: center;
            color: #3596e0;
            left: initial;
            font-size: 14px;
        }
        
       .response1, .response2, .response3, .response0, .response4, .response5 {
            display: none;
        }
        #carouselExampleControls {
            width: 30%;
            margin: auto;
        }
        #LuaChon {
            display: none;
        }
        #displayImg1 {
            margin-top: 30px;
        }
            #displayImg1 img {
                height: 50px;
                width: 50px;
                margin-right: 15px;
                display: inline-block;
            }
        #displayImg2 {
            margin-top: 30px;
        }
            #displayImg2 img {
                height: 50px;
                width: 50px;
                margin-right: 15px;
                display: inline-block;
            }
        #displayImg3 {
            margin-top: 30px;
        }
            #displayImg3 img {
                height: 50px;
                width: 50px;
                margin-right: 15px;
                display: inline-block;
            }
        #displayImg4 {
            margin-top: 30px;
        }
            #displayImg4 img {
                height: 50px;
                width: 50px;
                margin-right: 15px;
                display: inline-block;
            }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /*---------------User Details---------------------------  */
        /*
        .bd {
            margin: 20px;
        }*/
        .main {
            padding: 15px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 40px;
        }
            .main .topbar_ {
                overflow: hidden;
            }
                .main .topbar_ a {
                    float: right;
                    text-align: center;
                    padding: 20px 26px;
                    text-decoration: none;
                    font-size: 26px;
                }
                    .main .topbar_ a:hover {
                    }
        .row .sidebar {
            background-color: #d7d3d3;
            border: 1px solid lightgray;
            height: 480px;
            border-radius: 5px;
            margin-top: 5px;
        }
            .row .sidebar a {
                 display: block;
                color: inherit;
                padding-bottom: 10px;
                font-size: 18px;
                text-decoration: none;
                text-align: center;
            }
        .edit-tt a:hover {
            color: cornflowerblue;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .content {
            border: 1px solid lightgrey;
            margin-bottom: 20px;
            border-radius: 5px;
            padding-left: 25px;
            margin-top: 5px;
        }
        hr {
            margin-right: 20px;
        }
        .text-secondary {
            margin-top: 10px;
        }
        .card-body {
            margin-top: 10px;
        }
        .mt-3 h4 {
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 1px solid white;
        }
        /*-------------------------------------*/
        .col {
            background-color: rgb(247, 129, 51);
            border: 1px solid none;
            margin: 0px 20px;
            height: 200px;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.6s ease;
            color: black;
            border-radius: 5px;
            box-shadow: 10px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
            width: 100%;
            background-size: 250px 200px;
            background-repeat: no-repeat;
        }
        
        .rowbtn-create {
            text-align: center;
            display: flex;
        }
        .col:hover {
            background-color: rgb(248, 155, 94);
            opacity: 0.8;
        }
        /*-------------------------------------*/
        a {
            text-decoration: none
        }
        .small-container {
            display: none;
        }
        body {
            
        }
        .menu {
            max-height: 60px;
            background-color: rgb(161, 14, 8);
            margin: 2px 0px 5px 0px;
            display: flex;
            justify-content: space-around;
        }
            .menu ul {
                margin-bottom: 10px;
                display: flex;
            }
            .menu li {
                padding: 20px 15px;
                list-style-type: none;
            }
                .menu li a {
                    text-decoration: none;
                    color: white;
                    text-transform: uppercase;
                    cursor: pointer;
                }
                .menu li:hover a {
                    color: rgb(202, 209, 209);
                }
        .header {
            background-color: white;
            min-height: 80px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap-reverse;
        }
        .header_item {
            list-style: none;
            margin-left: 20px;
            margin-right: 50px;
            display: inline-block;
        }
        .btn-DT {
            text-decoration: none;
            display: inline-block;
            outline: none;
            border: none;
            color: #fff;
            padding: 10px 30px;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.2s ease;
            box-shadow: 2px 3px 3px gray;
        }
        .btn--warn {
            background-color: #d62500;
        }
        .btn-DT:hover {
            opacity: 0.8;
        }
        .cardn {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }
        .header_item h3 {
            cursor: pointer;
        }
        .row h3 {
            text-align: left;
            margin-left: 10px;
            width: 98%;
        }
        #RowTT {
            margin: auto;
        }
        .boxDiv {
            background-color: none;
            border: 1px solid rgba(0, 0, 0, 0.2);
            padding: 5px 5px 0px 5px;
            color: black;
            margin-bottom: 5px;
            text-align: left;
            border-radius: 4px;
            height: 368px;
            box-shadow: 0px 2px 0px 2px #f3f3f3;
        }
            .boxDiv img {
                height: 200px;
            }
            .boxDiv:hover {
                margin-top: -10px;
                transition: all 0.4s ease;
            }
        .btn_more {
            margin-bottom: 20px;
            padding-left: 93.5%;
            margin-top: 2px;
            
        }
        .row h3 {
            text-align: left;
        }
        .card-body label {
            margin-bottom: 15px;
        }
        .card .form-group .Coins-index {
            color: #ff6a00;
        }
        #loginLink, #registerLink {
            color: inherit;
        }
        
        /* asdasd */
        
        
            /*Chat Box*/
    
    .boxDivBell {
        height: auto;
        border:1px solid #808080;
        margin-bottom:5px;
        
        border-radius:5px;
    }
        .boxDivBell:hover {
            margin-top: 0 !important;
        }
        .boxDivBell p {
            font-size:12px;
            margin-bottom:0 !important;
        }
    /* Nút Để Mở Chatbox */
    .nut-mo-chatbox {
        color: white;
        padding: 10px 0px;
        border: none;
        cursor: pointer;
        
        width: 50px;
        border: 1px solid #ddd;
        margin-left: 10px;
      
        border-radius: 100%;
        background-color: black;
    }
        .nut-mo-chatbox:hover {
            background-color: grey;
        }
    /* Ẩn chatbox mặc định */
    .Chatbox {
        display: none;
      position: fixed;
        top: 70px;
        right: 250px;
        z-index: 9;
        width:300px;
    }
    /* Thêm style cho form */
    #containermsg {
        max-width: 300px;
        padding: 10px;
        background-color: white;
        border-radius: 10px;
        border: 1px solid #f1f1f1;
        box-shadow: 0px 1px 10px 3px #a7a7a7;
        position: relative;
    }
        /* thiết lập style textarea */
        #containermsg textarea {
            width: 100%;
           padding: 10px;
            margin: 5px 0 5px 0;
            border: none;
            background-color: #ddd;
            resize: none;
            min-height: 30px;
            border-radius:5px;
        }
            /*thiết lập style cho textarea khi được focus */
            #containermsg textarea:focus {
                background-color: #ddd;
                outline: none;
            }
        /* Thiết lập style cho nút trong form*/
        #containermsg .btn {
     
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }
        /* Thiết lập màu nền cho nút đóng chatbox */
        #containermsg .nut-dong-chatbox {
            background-color: white;
            color:red;
            width: 50px;
            position:absolute;
            top:0;
            right:0;
            padding: 0px !important;
        }
    .nut-dong-chatbox i{
        font-size:40px;
    }
    /* Thêm hiệu ứng hover cho nút, HÔM BỮA M CHỈNH THIẾU NO ADSSSSSSS chổ nào có r mà*/
    #containermsg .btn:hover, .nut-mo-chatbox:hover {
        opacity: 1;
    }
    .fa-comment-dots{
       font-size:20px;
    }
    #contentMsg li {
        list-style-type: none;
    }
    #contentMsg {
        height: 250px;
        border: 1px solid #ddd;
        border-radius: 5px;
        word-wrap: break-word;
        overflow: auto;
        background-color:#f0f0f0;
        padding:10px;
    }
    h1 {
        font-weight: bolder;
        color:#ff7f24;
    }
    .fa-bell{
        font-size:20px;
        color:yellow;
    }
    .boxDivBell strong{
        text-align:left;
        font-size:14px;
    }
    .boxDivBell a{
        text-decoration: none;
    }
    </style>
</head>

<body>