<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?=base_url()?>assets\logo\favicon.ico">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/mobile/style.css">
	<link rel="preload" href="NATS.woff2" as="font" type="<?= base_url(); ?>/font/woff2" crossorigin>


	<style>

#searchInputContainer {
  display: flex;
  align-items: center;
}
.logo {
            text-align: center; /* Mengatur posisi tengah */
            /* text-align: right; // Mengatur posisi kanan */
            /* text-align: left; // Mengatur posisi kiri */
			margin-top : 30px;
			margin-bottom : 30px;
        }

        .logo img {
            max-width: 25%; /* Mengatur lebar maksimum gambar */
            height: auto; /* Mengatur ketinggian gambar sesuai proporsi */
        }


        footer a {

padding : 10px;

}



	</style>

<style>

body{
  background:#651fff;
}

::-webkit-scrollbar {
    width: 10px
}

::-webkit-scrollbar-track {
    background: #eee
}

::-webkit-scrollbar-thumb {
    background: #888
}

::-webkit-scrollbar-thumb:hover {
    background: #555
}

.wrapper {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #651FFF
}

.main {
    background-color: #eee;
    width: 320px;
    height : 70vh;
    position: relative;
    border-radius: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 6px 0px 0px 0px
}

.scroll {
    overflow-y: scroll;
    scroll-behavior: smooth;
    height: 325px
}

.img1 {
    border-radius: 50%;
    background-color: #66BB6A
}

.name {
    font-size: 12px
}

.msg {
    background-color: #fff;
    font-size: 15px;
    padding: 5px;
    border-radius: 5px;
    font-weight: 500;
    color: #3e3c3c
}

.between {
    font-size: 8px;
    font-weight: 500;
    color: #a09e9e
}

.navbar {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.form-control {
    font-size: 12px;
    font-weight: 400;
    width: 230px;
    height: 30px;
    border: none
}

form-control: focus {
    box-shadow: none;
    overflow: hidden;
    border: none
}

.form-control:focus {
    box-shadow: none !important
}

.icon1 {
    color: #7C4DFF !important;
    font-size: 18px !important;
    cursor: pointer
}

.icon2 {
    color: #512DA8 !important;
    font-size: 18px !important;
    position: relative;
    left: 8px;
    padding: 0px;
    cursor: pointer
}

.icondiv {
    border-radius: 50%;
    width: 15px;
    height: 15px;
    padding: 2px;
    position: relative;
    bottom: 1px
}

</style>

	<title>Rideline</title>

</head>
<body>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <nav class="navbar navbar-light bg-light justify-content-between">
  <img src="<?= base_url()?>assets\logo\logo.png" width="70" height="auto" class="d-inline-block align-top" alt="">

  <div class="d-inline-block align-top" alt="" style="margin-right: 20px;">
      Saldo Rp. <?= $user['saldo']; ?>
<div>

</nav>



	<section class="container">
		<ul class="kategori_menu" style="margin-top: 2vh;" >
			<li class="active">
				<a href="#" >Chat</a>
			</li>
		</ul>
        
		<div class="row product-grid">

<!-- chat -->

<div class="d-flex justify-content-center container">
    <div class="">
        <div class="main">
            <div class="px-2 scroll">
                <!-- <div class="d-flex align-items-center">
                    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img1" /></div>
                    <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                        <p class="msg">Hi Dr. Hendrikson, I haven't been falling well for past few days.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center text-right justify-content-end ">
                    <div class="pr-2"> <span class="name">Dr. Hendrikson</span>
                        <p class="msg">Let's jump on a video call</p>
                    </div>
                    <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img1" /></div>
                </div>
                <div class="text-center"><span class="between">Call started at 10:47am</span></div>
                <div class="text-center"><span class="between">Call ended at 11:03am</span></div>
                <div class="d-flex align-items-center">
                    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img1" /></div>
                    <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                        <p class="msg">How often should i take this?</p>
                    </div>
                </div>
                <div class="d-flex align-items-center text-right justify-content-end ">
                    <div class="pr-2"> <span class="name">Dr. Hendrikson</span>
                        <p class="msg">Twice a day, at breakfast and before bed</p>
                    </div>
                    <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img1" /></div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img1" /></div>
                    <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                        <p class="msg">How often should i take this?</p>
                    </div>
                </div> -->

    <div id="body">
        <div id="messages"></div>
    </div>




            </div>
            <nav class="navbar bg-white navbar-expand-sm d-flex justify-content-between" style="margin-top: 25vh;">
             <input type="text number" name="text" id="text" class="form-control" style="font-size: 15px;" placeholder="tulis pesan">
                <div class="icondiv d-flex justify-content-end align-content-center text-center ml-2"> <i class="fa fa-paperclip icon"></i> 
             
                <input type="image" id="submit" value="POST" style="margin-right: 10px;" height="25px" src="<?= base_url()?>assets\logo\send.png" />
                <!-- <img src="<?= base_url()?>assets\logo\send.png" width="auto" height="25px" style="margin-right: 10px;" class="d-inline-block align-top" alt=""> -->

            </div>
            </nav>
            <input type="text" id="recipient_id" placeholder="Recipient id ..">

        </div>
    </div>

    <!-- endchat -->





        </div>
	</section>

	<script src="<?= base_url(); ?>assets/js/jquery-3.6.3.min.js"></script>

    <script>

var conn = new WebSocket('ws://localhost:8282');

if (<?= $user['id']?> != 18){

    $("#recipient_id").hide();
    $("#recipient_id").val(18)

}


var client = {
        user_id: <?= $user['id']?>,
        userName : '<?= $user['name']?>',
        recipient_id: null,
        type: 'socket',
        token: null,
        message: null
    };

conn.onopen = function (e) {
        conn.send(JSON.stringify(client));
        $('#messages').append('<font color="green">Successfully connected as user ' + client.userName + '</font><br>');
    };

    conn.onmessage = function (e) {
        var data = JSON.parse(e.data);
        if (data.message) {

            if (data.user_id != 18){
                $('#messages').append( data.user_id + ':' + data.message + '<br>');
            } else {


                $('#messages').append('<div class="d-flex align-items-center text-right justify-content-end ">');
                $('#messages').append('<div class="pr-2"> <span class="name">'+ data.userName +'</span>');
                $('#messages').append('<div class="msg">'+ data.message  +'</div> </div> </div>');
            }

            // <div class="d-flex align-items-center text-right justify-content-end ">
            //         <div class="pr-2"> <span class="name">Dr. Hendrikson</span>
            //             <p class="msg">Let's jump on a video call</p>
            //         </div>
            //         <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img1" /></div>
            //     </div>
            // $('#messages').append( ((data.user_id != 18) ? data.user_id + ': ' + data.userName  :  data.userName) + ' : ' + data.message + '<br>');
        }
        if (data.type === 'token') {
            $('#token').html('JWT Token : ' + data.token);
        }
    };

    $('#submit').click(function () {
        client.message = $('#text').val();
        client.token = $('#token').text().split(': ')[1];
        client.type = 'chat';
        if ($('#recipient_id').val()) {
            client.recipient_id = $('#recipient_id').val();
        }
        conn.send(JSON.stringify(client));
        // $('#messages').append(client.userName + ' : ' + client.message + '<br>');
        $('#messages').append('<div class="d-flex align-items-center">')
        $('#messages').append('<div class="pr-2 pl-1"> <span class="name">'+ client.userName +' : </span>')
        $('#messages').append('<div class="msg">'+client.message+'</div> </div></div>')

        $('#text').val('');
    });





    </script>
</body>

</html>
