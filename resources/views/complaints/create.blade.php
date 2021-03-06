@extends('main')
@section('heading')
<div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-6">
            <div class="site-logo">
                <a href="{{url('/')}}"><img src="../images/logonew1.png" alt=" " width="50%" height="2%"></a>
            </div>
        </div>
        <div class="col-6 text-right ml-auto ">
            <h2 style="font-size: 400%;color:darkorange;margin-top:3%"> CC QUERIES</h2>
        </div>
      </div>
    </div>
</div>

@endsection

@section('body')

        <script type="text/javascript">
        
            function showfield(name){
            if(name=='Other')document.getElementById('div1').style.display="block";
            else document.getElementById('div1').style.display="none";
            }
 
            function hidefield() {
            document.getElementById('div1').style.display='none';
            }

            function TDate() {
                var availabledate = document.getElementById("availabledate").value;
                var ToDate = new Date();

                if (new Date(availabledate).getTime() <= ToDate.getTime()) {
                    alert("Inappropriate date! The date and time cannot be before Current time");
                    return false;
                }
                return true;
            }


            
        </script>
<body onload="hidefield()">

    <div class="back-cover" style="background-image:url('../images/cc2.jpg');">  
        <br>
        <br>       
        <div class="container">
            <div class="row justify-content-center">
            
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background:darkorange">
                        <h1 style="text-align:center; font-weight:400; font-style:arial; color:white;">COMPLAINT FORM</h1>
                        </div>

                            <div class="card-body">

                    

                                    <form enctype="multipart/form-data" autocomplete="off" action="{{ route('complaints.store') }}" method="POST" data-parsley-validate=''>
                                                @csrf
                                    <div class="form-group">    
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" required='' data-parsley-pattern="[a-zA-Z\s]+$" data-parsley-trigger="keyup" />
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="regno">Registration Number:</label>
                                        <input type="text" class="form-control" name="regno" id="regno" required='' data-parsley-type="alphanum" data-parsley-trigger="keyup" />
                                        <span class="text-danger">{{ $errors->first('regno') }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="phoneno">Contact Number:</label>
                                        <input type="text" class="form-control" name="phoneno" id="phoneno" required='' data-parsley-type="integer" data-parsley-pattern="[0-9]+$" data-parsley-trigger="keyup" />
                                        <span class="text-danger">{{ $errors->first('phoneno') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" required='' data-parsley-type="email" data-parsley-type="email" data-parsley-trigger="keyup" />
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="hostel">Hostel:</label>
                                        <input type="text" class="form-control" name="hostel" id="hostel" required='' data-parsley-pattern="[a-zA-Z\s]+$" data-parsley-trigger="keyup" />
                                        <span class="text-danger">{{ $errors->first('hostel') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="room">Room No.:</label>
                                        <input type="text" class="form-control" name="room" id="room" required='' data-parsley-type="integer" data-parsley-range="[1, 1000]" data-parsley-trigger="keyup" />
                                        <span class="text-danger">{{ $errors->first('room') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nature">Nature of Problem</label>
                                        <select class="form-control" name="nature" id="nature" onchange="showfield(this.options[this.selectedIndex].value)" />
                                        <option selected="selected">Choose...</option>
                                        <option value="Wifi not working">Wifi not working</option>
                                        <option value="LAN port broken">LAN port broken</option>
                                        <option value="Weak Connection">Weak Connection</option>
                                        <option value="Damaged Wire">Damaged Wire</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <div id="div1">Other Problem: <input type="text" class="form-control" placeholder="Other problem please write here..." name="other" /></div>
                                        <span class="text-danger">{{ $errors->first('nature') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="availabledate">Availability Date:</label>
                                        <input type="date" class="form-control" name="availabledate" id="availabledate" onchange="TDate()" required='' data-parsley-trigger="keyup" />
                                        <span class="text-danger">{{ $errors->first('availabledate') }}</span>
                                    </div> 
                                    <div class="form-group">
                                        <label for="availabletime">Availability Time:</label>
                                        <input type="time" class="form-control" name="availabletime" id="availabletime" required='' data-parsley-trigger="keyup" />
                                        <span class="text-danger">{{ $errors->first('availabletime') }}</span>
                                    </div>          
                                    <div class="form-group">              
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                    </form>

                            </div>
                    </div>
                </div>
            </div>
        </div>
            <br>
            <br>
    </div>
</body>
@endsection