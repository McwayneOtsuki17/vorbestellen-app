{% load static %}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vorbestellen | Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{% static 'vendor/animate.css/animate.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/bootstrap/css/bootstrap.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/bootstrap-icons/bootstrap-icons.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/boxicons/css/boxicons.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/glightbox/css/glightbox.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/remixicon/remixicon.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/swiper/swiper-bundle.min.css' %}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{% static 'css/style.css' %}" rel="stylesheet">
  <!-- Data Table CSS File -->
  <link href="{% static 'css/style-datatable.css' %}" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <!-- data table scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1s/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
#hidden_alpha {
    display: none;
}
#hidden_bravo {
    display: none;
}
#hidden_charlie {
    display: none;
}
#hidden_delta {
    display: none;
}

#updhidden_alpha {
    display: none;
}
#updhidden_bravo {
    display: none;
}
#updhidden_charlie {
    display: none;
}
#updhidden_delta {
    display: none;
}

table, th, td {
  border: 1px solid black;
  border-radius: 10px;
}
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{% url 'vorbestellenapp:index_view' %}">vor<span
            class="highlight">best</span>ellen<span class="highlight">.</span></a></h1>
      <!-- <h1 class="logo me-auto"><a href="index.html">vorbestellen.</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{% url 'vorbestellenapp:index_view' %}" class="active">Home</a></li>

          <!-- Info Nav -->
          <li class="dropdown"><a href="#"><span>Info</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{% url 'vorbestellenapp:about_view' %}">About Us</a></li>
              <li><a href="{% url 'vorbestellenapp:contact_view' %}">Contact Us</a></li>
            </ul>
          </li>

          <!-- Services Nav -->
          <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{% url 'vorbestellenapp:vacantrooms_view' %}">Dashboard</a></li>
              <li class="dropdown"><a href="{% url 'vorbestellenapp:pricing_view' %}" class="#"><span>Prices &
                    Rooms</span></a>
              </li>
            </ul>
          </li>

          <!-- If admin kay lahi ang dropdown sa service -->
          {% if current_user == 'admin' %}
            <li class="dropdown"><a href="#"><span>Manage</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{% url 'vorbestellenapp:rooms_view' %}">Manage Rooms</a></li>
                <li><a href="{% url 'vorbestellenapp:managebookings_view' %}">Manage Bookings</a></li>
                <li><a href="{% url 'vorbestellenapp:manageusers_view' %}">Manage User</a></li>     
                </li>
              </ul>
            </li>
          {% endif %}
          <!-- end -->

        {% if current_user %}
        <li class="dropdown"><a href="#"><span>{{current_user}}</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          {% if current_user != 'admin' %}
            <li><a href="{% url 'vorbestellenapp:myreservations_view' %}">My Reservations</a></li>
            <li><a href="{% url 'vorbestellenapp:account_view' %}">Account Settings</a></li>
          {% endif %}
            <li><a href="{% url 'vorbestellenapp:logout' %}">Logout</a></li>
          </ul>

          {% else %}
        <li><a href="#" class="getstarted" data-toggle="modal" data-target="#exampleModalCenter">Login</a></li>
        </ul>
        {% endif %}
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">


    <br><br><br>
    <div class="container">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">

              <h2>Manage <b>Rooms</b></h2>
            </div>
            <div class="col-sm-6">
              <a href="#addRoomModal" class="btn btn-secondary" data-toggle="modal"><i
                  class="material-icons">&#xE147;</i> <span class="light">Add New Room</span></a>
              <a href="#deleteRoomModal" class="btn btn-danger" data-toggle="modal"><i
                  class="material-icons">&#xE15C;</i> <span>Delete Selected</span></a>
            </div>
          </div>
        </div>
        <!-- Data Table -->
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>
                <span class="custom-checkbox">
                  <input type="checkbox" id="selectAll">
                  <label for="selectAll"></label>
                </span>
              </th>
              <th>Room Code</th>
              <th>Name</th>
              <th>Type</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {% for rooms in rooms %}
            <tr>
              <td>
                <span class="custom-checkbox">
                  <input type="checkbox" id="checkbox1" name="options[]" value="1">
                  <label for="checkbox1"></label>
                </span>
              </td>
              <!-- AutoIncremented -->
              <td>{{rooms.room_code}}</td>
              <td>{{rooms.room_name}}</td>
              <td>{{rooms.room_type}}</td>
              <td><img src="{{rooms.image.url}}"
                  style="padding: 5px; width: 200px; border-radius: 5%;" /></td>
              <td>
                <a href="#" class="edit" type="button" data-toggle="modal"
                  data-target="#editRoomModal-{{rooms.room_code}}"><i class="material-icons" data-toggle="tooltip"
                    title="Edit">&#xE254;</i></a>
                <a href="#" class="delete" data-toggle="modal" data-target="#deleteRoomModal-{{rooms.room_code}}"><i
                    class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
              </td>
            </tr>
          </tbody>
          <!-- Edit Modal HTML -->
          <div id="editRoomModal-{{rooms.room_code}}" class="modal fade">
            <form id="updateForm-{{rooms.room_code}}" method="POST"enctype="multipart/form-data">
              {% csrf_token %}
              {{ form.as_p }}
              <div class="modal-dialog modal-dialog-centered" style="min-width:58.5%">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><span class="highlight">Update</span> Room</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group" style="padding: 3px; display: inline-block; width: 200px;">
                      <!-- AutoIncremented -->
                      <label>Room Code</label>
                      <input type="text" id="updroom_code" name="updroom_code" class="form-control"
                        placeholder="auto incremented" value="{{rooms.room_code}}" readonly required>
                    </div>
                    <div class="form-group" style="padding: 3px; display: inline-block; width: 400px;">
                      <label>Name</label>
                      <input type="text" id="updroom_name" name="updroom_name" class="form-control"
                        value="{{rooms.room_name}}" required>
                    </div>
                    <div class="form-group" style="padding: 3px; display: inline-block; width: 200px;">
                      <label>Type</label>
                      <select id="updroom_type-{{rooms.room_code}}" name="updroom_type" class="form-control"value="{{rooms.room_type}}" required>
                        <option value="Alpha" id="UpdAlpha">Alpha</option>
                        <option value="Bravo" id="UpdBravo">Bravo</option>
                        <option value="Charlie" id="UpdCharlie">Charlie</option>
                        <option value="Delta"id="UpdDelta">Delta</option>
                      </select>
                    </div>

                    <br>
                    <br>
                      <div class="form-group">
                      <!-- <label>Room Images</label> -->
                      <figure style="display: inline-block;">
                        <img src="{% static 'img/rooms/Alpha.jpg' %}" style="padding: 5px; width: 200px; border-radius: 3%; display: inline;" class="ui-widget-content"/><figcaption style="text-align: center;">Alpha</figcaption>
                      </figure>
                      <figure style="display: inline-block;">
                        <img src="{% static 'img/rooms/Alpha2.jpg' %}" style="padding: 5px; width: 200px; height: 152px; border-radius: 3%;" class="ui-widget-content"/><figcaption style="text-align: center;">oneAl</figcaption>
                      </figure>
                      <figure style="display: inline-block;">
                        <img src="{% static 'img/rooms/Bravo.jpg' %}" style="padding: 5px; width: 200px; height: 152px; border-radius: 3%;" class="ui-widget-content"/><figcaption style="text-align: center;">Bravo</figcaption>
                      </figure>
                      <figure style="display: inline-block;">
                        <img src="{% static 'img/rooms/Bravo2.jpg' %}" style="padding: 5px; width: 200px; height: 152px; border-radius: 3%;" class="ui-widget-content"/><figcaption style="text-align: center;">oneBr</figcaption>
                      </figure>
                      <figure style="display: inline-block;">
                        <img src="{% static 'img/rooms/Charlie.jpg' %}" style="padding: 5px; width: 200px; height: 152px; border-radius: 3%;" class="ui-widget-content"/><figcaption style="text-align: center;">Charlie</figcaption>
                      </figure>
                      <figure style="display: inline-block;">
                        <img src="{% static 'img/rooms/Charlie2.jpg' %}" style="padding: 5px; width: 200px; height: 152px; border-radius: 3%;" class="ui-widget-content"/><figcaption style="text-align: center;">oneCh</figcaption>
                      </figure>
                      <figure style="display: inline-block;">
                        <img src="{% static 'img/rooms/Delta.jpg' %}" style="padding: 5px; width: 200px; height: 152px; border-radius: 3%;" class="ui-widget-content"/><figcaption style="text-align: center;">Delta</figcaption>
                      </figure>
                      <figure style="display: inline-block;">
                        <img src="{% static 'img/rooms/Delta2.jpg' %}" style="padding: 5px; width: 200px; height: 152px; border-radius: 3%;" class="ui-widget-content"/><figcaption style="text-align: center;">oneDe</figcaption>
                      </figure>
                        <!-- remove hidden for debug, variable testing -->
                      <input type="text" id="updroom_image" name="updroom_image" class="form-control"
                        required>
                        <!-- end -->
                      <input type="text" id="updroom_imageA" name="updroom_imageA" class="form-control"
                        value='images/Alpha.jpg'hidden readonly required>
                        <input type="text" id="updroom_imageA1" name="updroom_imageA1" class="form-control"
                        value='images/Alpha2.jpg'hidden readonly required>
                        <input type="text" id="updroom_imageB" name="updroom_imageB" class="form-control"
                        value='images/Bravo.jpg'hidden readonly required>
                        <input type="text" id="updroom_imageB1" name="updroom_imageB1" class="form-control"
                        value='images/Bravo2.jpg'hidden readonly required>
                        <input type="text" id="updroom_imageC" name="updroom_imageC" class="form-control"
                        value='images/Charlie.jpg'hidden readonly required>
                        <input type="text" id="updroom_imageC1" name="updroom_imageC1" class="form-control"
                        value='images/Charlie2.jpg'hidden readonly required>
                        <input type="text" id="updroom_imageD" name="updroom_imageD" class="form-control"
                        value='images/Delta.jpg'hidden readonly required>
                        <input type="text" id="updroom_imageD1" name="updroom_imageD1" class="form-control"
                        value='images/Delta2.jpg'hidden readonly required>
                    </div>
              </div>




              <script>
              function updselectImage(nameSelect)
              {
                  if(nameSelect){
                      UpdAlpha = document.getElementById("UpdAlpha").value;
                      UpdBravo = document.getElementById("UpdBravo").value;
                      UpdCharlie = document.getElementById("UpdCharlie").value;
                      UpdDelta = document.getElementById("UpdDelta").value;
                      if(UpdAlpha == nameSelect.value){
                          document.getElementById("updhidden_alpha").style.display = "block";
                          document.getElementById("updhidden_bravo").style.display = "none";
                          document.getElementById("updhidden_charlie").style.display = "none";
                          document.getElementById("updhidden_delta").style.display = "none";
                      }
                      else if(UpdBravo == nameSelect.value){
                          document.getElementById("updhidden_bravo").style.display = "block";
                          document.getElementById("updhidden_alpha").style.display = "none";
                          document.getElementById("updhidden_charlie").style.display = "none";
                          document.getElementById("updhidden_delta").style.display = "none";
                      }
                      else if(UpdCharlie == nameSelect.value){
                          document.getElementById("updhidden_charlie").style.display = "block";
                          document.getElementById("updhidden_alpha").style.display = "none";
                          document.getElementById("updhidden_bravo").style.display = "none";
                          document.getElementById("updhidden_delta").style.display = "none";
                      }
                      else if(UpdDelta == nameSelect.value){
                          document.getElementById("updhidden_delta").style.display = "block";
                          document.getElementById("updhidden_alpha").style.display = "none";
                          document.getElementById("updhidden_bravo").style.display = "none";
                          document.getElementById("updhidden_charlie").style.display = "none";
                      }
                  }
                  else{
                      document.getElementById("updhidden_alpha").style.display = "none";
                      document.getElementById("updhidden_bravo").style.display = "none";
                      document.getElementById("updhidden_charlie").style.display = "none";
                      document.getElementById("updhidden_delta").style.display = "none";
                  }
              }

              </script>
              <script>
                function UpdAlphaOne() {
                  document.getElementById("updroom_image").value = "Alpha";
                }
                function UpdAlphaTwo() {
                  document.getElementById("updroom_image").value = "oneAl";
                }
                function UpdBravoOne(){
                  document.getElementById("updroom_image").value = "Bravo";
                }
                function UpdBravoTwo(){
                  document.getElementById("updroom_image").value = "oneBr";
                }
                function UpdCharlieOne(){
                  document.getElementById("updroom_image").value = "Charlie";
                }
                function UpdCharlieTwo(){
                  document.getElementById("updroom_image").value = "oneCh";
                }
                function UpdDeltaOne(){
                  document.getElementById("updroom_image").value = "Delta";
                }
                function UpdDeltaTwo(){
                  document.getElementById("updroom_image").value = "oneDe";
                }
              </script>
                    
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                      <button type="submit" id="btnUpdateRoom" name="btnUpdateRoom"
                        class="btn btn-secondary">SAVE</button>
                    </div>
                  </div>
            </form>
          </div>
      </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteRoomModal-{{rooms.room_code}}" class="modal fade">
      <form id="deleteForm" method="POST">
        {% csrf_token %}
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><span class="highlight">Delete</span> Room</h4>
            </div>
            <div class="modal-body">
              <!-- add hidden value to find record for deletion -->
              <input type="text" id="delroom_code" name="delroom_code" class="form-control"
                placeholder="auto incremented" value="{{rooms.room_code}}" readonly hidden required>
              <p>Are you sure you want to delete records?</p>
              <p class="highlight"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" id="btnDeleteRoom" name="btnDeleteRoom" class="btn btn-danger" value="Delete">
            </div>
      </form>
    </div>
    </div>
    </div>
    {% endfor %}
    </table>

    <div class="clearfix">
      <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
      <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
      </ul>
    </div>
    </div>
    </div>
    <!-- Data Table End -->

    <!-- Add Modal HTML -->
    <div id="addRoomModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form id="form1" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
            {% csrf_token %}
            {{ form.as_p }}
            <div class="modal-header">
              <h4 class="modal-title"><span class="highlight">Register</span> Room</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" id="roomname" name="roomname" required>
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <!-- <input class="form-control" required> -->
                  <select id="roomtype" name="roomtype" class="form-control" onchange="selectImage(this)" required>
                    <option selected="true" disabled="disabled" value="">Select a Room</option>
                    <option value="Alpha" id="AddAlpha">Alpha</option>
                    <option value="Bravo" id="AddBravo">Bravo</option>
                    <option value="Charlie" id="AddCharlie">Charlie</option>
                    <option value="Delta"id="AddDelta">Delta</option>
                  </select>
                </div>
                <br>
              <div id="hidden_alpha">
                      <div class="form-group">
                      <label>Room</label>
                        <ul>
                          <li>
                            <input type="checkbox" onclick="AddAlphaOne()" name="imagecheck"value="Bravo"/>
                            <label for="AlphaCheck"><img src="{% static 'img/rooms/Alpha.jpg' %}" style="padding: 5px; width: 200px; border-radius: 10%;" class="ui-widget-content"/></label>
                          </li>
                          <li>
                            <input type="checkbox" onclick="AddAlphaTwo()" name="imagecheck"value="Bravo"/>
                            <label for="BravoCheck"><img src="{% static 'img/rooms/Alpha2.jpg' %}" style="padding: 5px; width: 200px; border-radius: 10%;" class="ui-widget-content"/></label>
                          </li>
                        </ul>
                        <!-- remove hidden for debug, variable testing -->
                      <input type="text" id="addroom_image" name="addroom_image" class="form-control"
                        hidden readonly>
                        <!-- end -->
                      <input type="text" id="addroom_imageA" name="addroom_imageA" class="form-control"
                        value='images/Alpha.jpg'hidden readonly required>
                        <input type="text" id="addroom_imageAone" name="addroom_imageAone" class="form-control"
                        value='images/Alpha2.jpg'hidden readonly required>
                    </div>
              </div>

              <div id="hidden_bravo">
                      <div class="form-group">
                      <label>Room</label>
                        <ul>
                          <li>
                            <input type="checkbox" onclick="AddBravoOne()" name="imagecheck"value="Bravo"/>
                            <label for="AlphaCheck"><img src="{% static 'img/rooms/Bravo.jpg' %}" style="padding: 5px; width: 200px; border-radius: 10%;" class="ui-widget-content"/></label>
                          </li>
                          <li>
                            <input type="checkbox" onclick="AddBravoTwo()" name="imagecheck"value="Bravo"/>
                            <label for="BravoCheck"><img src="{% static 'img/rooms/Bravo2.jpg' %}" style="padding: 5px; width: 200px; border-radius: 10%;" class="ui-widget-content"/></label>
                          </li>
                        </ul>
                      <input type="text" id="addroom_imageB" name="addroom_imageB" class="form-control"
                        value='images/Bravo.jpg'hidden readonly required>
                        <input type="text" id="addroom_imageB1" name="addroom_imageB1" class="form-control"
                        value='images/Bravo2.jpg'hidden readonly required>
                    </div>
              </div>

              <div id="hidden_charlie">
                      <div class="form-group">
                      <label>Room</label>
                        <ul>
                          <li>
                            <input type="checkbox" onclick="AddCharlieOne()" name="imagecheck"value="Bravo"/>
                            <label for="AlphaCheck"><img src="{% static 'img/rooms/Charlie.jpg' %}" style="padding: 5px; width: 200px; border-radius: 10%;" class="ui-widget-content"/></label>
                          </li>
                          <li>
                            <input type="checkbox" onclick="AddCharlieTwo()" name="imagecheck"value="Bravo"/>
                            <label for="BravoCheck"><img src="{% static 'img/rooms/Charlie2.jpg' %}" style="padding: 5px; width: 200px; border-radius: 10%;" class="ui-widget-content"/></label>
                          </li>
                        </ul>
                      <input type="text" id="addroom_imageC" name="addroom_imageC" class="form-control"
                        value='images/Charlie.jpg'hidden readonly required>
                        <input type="text" id="addroom_imageC1" name="addroom_imageC1" class="form-control"
                        value='images/Charlie2.jpg'hidden readonly required>
                    </div>
              </div>

              <div id="hidden_delta">
                      <div class="form-group">
                      <label>Room</label>
                        <ul>
                          <li>
                            <input type="checkbox" onclick="AddDeltaOne()" name="imagecheck"value="Bravo"/>
                            <label for="AlphaCheck"><img src="{% static 'img/rooms/Delta.jpg' %}" style="padding: 5px; width: 200px; border-radius: 10%;" class="ui-widget-content"/></label>
                          </li>
                          <li>
                            <input type="checkbox" onclick="AddDeltaTwo()" name="imagecheck"value="Bravo"/>
                            <label for="BravoCheck"><img src="{% static 'img/rooms/Delta2.jpg' %}" style="padding: 5px; width: 200px; border-radius: 10%;" class="ui-widget-content"/></label>
                          </li>
                        </ul>
                      <input type="text" id="addroom_imageD" name="addroom_imageD" class="form-control"
                        value='images/Delta.jpg'hidden readonly required>
                        <input type="text" id="addroom_imageD1" name="addroom_imageD1" class="form-control"
                        value='images/Delta2.jpg'hidden readonly required>
                    </div>
              </div>

              <script>
              function selectImage(nameSelect)
              {
                  if(nameSelect){
                      AddAlpha = document.getElementById("AddAlpha").value;
                      AddBravo = document.getElementById("AddBravo").value;
                      AddCharlie = document.getElementById("AddCharlie").value;
                      AddDelta = document.getElementById("AddDelta").value;
                      if(AddAlpha == nameSelect.value){
                          document.getElementById("hidden_alpha").style.display = "block";
                          document.getElementById("hidden_bravo").style.display = "none";
                          document.getElementById("hidden_charlie").style.display = "none";
                          document.getElementById("hidden_delta").style.display = "none";
                      }
                      else if(AddBravo == nameSelect.value){
                          document.getElementById("hidden_bravo").style.display = "block";
                          document.getElementById("hidden_alpha").style.display = "none";
                          document.getElementById("hidden_charlie").style.display = "none";
                          document.getElementById("hidden_delta").style.display = "none";
                      }
                      else if(AddCharlie == nameSelect.value){
                          document.getElementById("hidden_charlie").style.display = "block";
                          document.getElementById("hidden_alpha").style.display = "none";
                          document.getElementById("hidden_bravo").style.display = "none";
                          document.getElementById("hidden_delta").style.display = "none";
                      }
                      else if(AddDelta == nameSelect.value){
                          document.getElementById("hidden_delta").style.display = "block";
                          document.getElementById("hidden_alpha").style.display = "none";
                          document.getElementById("hidden_bravo").style.display = "none";
                          document.getElementById("hidden_charlie").style.display = "none";
                      }
                  }
                  else{
                      document.getElementById("hidden_alpha").style.display = "none";
                      document.getElementById("hidden_bravo").style.display = "none";
                      document.getElementById("hidden_charlie").style.display = "none";
                      document.getElementById("hidden_delta").style.display = "none";
                  }
              }

              </script>
              <script>
                function AddAlphaOne() {
                  document.getElementById("addroom_image").value = "Alpha";
                }
                function AddAlphaTwo() {
                  document.getElementById("addroom_image").value = "oneAl";
                }
                function AddBravoOne(){
                  document.getElementById("addroom_image").value = "Bravo";
                }
                function AddBravoTwo(){
                  document.getElementById("addroom_image").value = "oneBr";
                }
                function AddCharlieOne(){
                  document.getElementById("addroom_image").value = "Charlie";
                }
                function AddCharlieTwo(){
                  document.getElementById("addroom_image").value = "oneCh";
                }
                function AddDeltaOne(){
                  document.getElementById("addroom_image").value = "Delta";
                }
                function AddDeltaTwo(){
                  document.getElementById("addroom_image").value = "oneDe";
                }
              </script>

            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <button type="submit" id="btnAddRoom" name="btnAddRoom" class="btn btn-secondary">SAVE</button>
            </div>
          </form>
        </div>
      </div>
    </div>




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Vorbestellen</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Info</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Conference Rooms</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Reservations</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Project Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Vorbestellen</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- MODAL -->
  &ensp;
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn-get-into animate__animated animate__fadeInUp scrollto" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <!-- <div class="modal-header">
    <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" class="ion-ios-close"></span>
    </button>
    </div> -->
        <div class="modal-body p-4 p-md-5">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="ion-ios-person"></span>
          </div>
          <h3 class="text-center mb-4">Sign In</h3>
          <form id="form1" action="" method="POST" autocomplete="off" enctype="multipart/form-data" class="login-form">
            {% csrf_token %}
            <div class="form-group">
              <input type="text" class="form-control rounded-left" id="username" name="username" placeholder="Username">
            </div>
            <br>
            <div class="form-group d-flex">
              <input type="password" class="form-control rounded-left" id="password" name="password"
                placeholder="Password">
            </div>
            <div class="form-group">
              <br><br>
              <button type="submit" class="form-control btn btn-danger rounded submit px-3">Login</button>
              <!-- <button type="submit" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</button> -->
            </div>
            <br>

            <div class="form-group d-md-flex">
              <div class="form-check w-50">
                <label class="custom-control fill-checkbox">
                  <input type="checkbox" class="fill-control-input">
                  <span class="fill-control-indicator"></span>
                  <span class="fill-control-description">Remember Me</span>
                </label>
              </div>
              <div class="w-50 text-md-right">
                <a href="#">Forgot Password</a>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer justify-content-center">
          <p>Not a member? <a href="{% url 'vorbestellenapp:signup_view' %}">Create an account</a></p>
        </div>
      </div>
    </div>

  </div>

  <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
  </script>

  <!-- END MODAL -->

  <!-- Vendor JS Files -->
  <script src="{% static 'vendor/bootstrap/js/bootstrap.bundle.min.js' %}"></script>
  <script src="{% static 'vendor/glightbox/js/glightbox.min.js' %}"></script>
  <script src="{% static 'vendor/isotope-layout/isotope.pkgd.min.js' %}"></script>
  <script src="{% static 'vendor/swiper/swiper-bundle.min.js' %}"></script>
  <script src="{% static 'vendor/waypoints/noframework.waypoints.js' %}"></script>
  <script src="{% static 'vendor/php-email-form/validate.js' %}"></script>

  <!-- Template Main JS File -->
  <script src="{% static 'js/main.js' %}"></script>

  <!-- Data Table Script -->
  <script>
    $(document).ready(function () {
      // Activate tooltip
      $('[data-toggle="tooltip"]').tooltip();

      // Select/Deselect checkboxes
      var checkbox = $('table tbody input[type="checkbox"]');
      $("#selectAll").click(function () {
        if (this.checked) {
          checkbox.each(function () {
            this.checked = true;
          });
        } else {
          checkbox.each(function () {
            this.checked = false;
          });
        }
      });
      checkbox.click(function () {
        if (!this.checked) {
          $("#selectAll").prop("checked", false);
        }
      });
    });
  </script>

<script>
  function checkAlpha() {
    document.getElementById("updroom_image").value = "Alpha";
  }
  function checkBravo(){
    document.getElementById("updroom_image").value = "Bravo";
  }
  function checkCharlie(){
    document.getElementById("updroom_image").value = "Charlie";
  }
  function checkDelta(){
    document.getElementById("updroom_image").value = "Delta";
  }
</script>


</body>

</html>