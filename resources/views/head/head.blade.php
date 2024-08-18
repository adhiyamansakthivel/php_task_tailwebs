<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tailwebs</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ url('/') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins:500' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    
  <style>
    body {
      background-color: #e4e4e4;/* Grey background color */
            font-family:  'Poppins';
        }
        .navbar {
            background-color: #ffffff; 
        }
        h1{
          color:red;
          font-size: 24px;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: white;
        }
        .container-fluid {
            padding: 20px;
        }
        .navColor{

        }
        th {
            border-right: 2px solid #E0E0E0;
            color: #727272;
            font-weight: normal;
           
        }
        thead{
          border-collapse: separate;
          border-spacing: 15px;
        }
       
        tr{
          border-bottom: 2px solid #E0E0E0;
        }
        label{
          color: #706e6e;
          font-weight: normal;
        }
        .add-button {
            background-color: #000000;
            color: white;
            border: none;
            padding: 10px 100px;
            cursor: pointer;
        }
        .modal-button {
            background-color: #000000;
            color: white;
            border: none;
            padding: 10px 100px;
            cursor: pointer;
        }
        .modal-button-login {
            background-color: #000000;
            color: white;
            border: none;
            padding: 10px 100px;
            cursor: pointer;
            margin-top: 50px;
        }
        .dropbtn {
          width: 24px;
          height: 24px;
          background-color: #000000;
          color: white;
          padding: 2px;
          font-size: 50%;
          margin: none;
          border-radius: 50%;
        }

        .dropdown {
          position: relative;
        }

        .dropdown-content {
          display: none;
          position: relative;
          background-color: #f1f1f1;
          min-width: 160px;
          margin: 2px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 3px 13px;
          text-decoration: none;
          display: block;
        }

      .dropdown-content a:hover {background-color: #ddd;}

      .dropdown:hover .dropdown-content {display: block;}

      .dropdown:hover .dropbtn {background-color: #000000;}

      .container-login{
      max-width: 100%;
    }

    </style>
  </head>