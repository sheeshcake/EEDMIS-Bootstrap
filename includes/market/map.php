<!-- Temporary StyleSheet -->
<style type="text/css">
    #green,#yellow{
        text-align: center;
        width: 100%;
        height: 200px;
    }
    #orange{
        text-align: center;
        width: 100%;
        height: 100px;
    }
    #orange-f{
        text-align: center;
        width: 95%;
        height: 50px;
    }
    #blue{
        text-align: center;
        width: 100%;
        height: 100px;
    }
    #blue-s{
        text-align: center;
        width: 100%;
        height: 150px;
    }
    #red{
        text-align: center;
        width: 100%;
        height: 500px;
    }
    .cont{
        border-style: dotted;
        display: block;
        padding: 2%;
    }
</style>
<center><h1>Tambo Market Map</h1></center>
<div class="cont">
    <div style="display: flex; border-style: dotted;">
        <div style="display: block; margin: 1%; width: 80%;">
            <div style="border-style: dotted;">
                <div class="card" id="blue" style="background-color: blue;">
                    <button data="blue" data-target="#exampleModal" class="btn stretched-link">Blue Department</button>
                </div>
            </div><br>
            <div style="border-style: dotted;">
                <div class="card" id="green" style="background-color: green;" data-toggle="modal" data-target="#exampleModal">
                    <button data="green" data-target="#exampleModal" class="btn stretched-link">Green Department</button>
                </div>
            </div><br>
            <div style="border-style: dotted;">
                <div class="card" id="yellow" style="background-color: yellow;" data-toggle="modal" data-target="#exampleModal">
                    <button data="yellow" data-target="#exampleModal" class="btn stretched-link">Yellow Department</button>
                </div>
            </div><br>
            <div style="border-style: dotted;">
                <div class="card" id="orange" style="background-color: orange;" data-toggle="modal" data-target="#exampleModal">
                    <button data="orange" data-target="#exampleModal" class="btn stretched-link">Orange Department</button>
                </div>
            </div><br>
        </div>
        <div style="display: block; margin: 1%; text-align: center; width: 20%;">
            <div style="border-style: dotted;">
                <div class="card" id="blue-s" style="background-color: blue;" data-toggle="modal" data-target="#exampleModal">
                    <button data="blue" data-target="#exampleModal" class="btn stretched-link">Blue Department</button>
                </div>
            </div><br>
            <div style="border-style: dotted;">
                <div class="card" id="red" style="background-color: red;" data-toggle="modal" data-target="#exampleModal">
                    <button data="red" data-target="#exampleModal" class="btn stretched-link">Red Department</button>
                </div>
            </div><br>
        </div>
    </div>
    <div class="card" id="orange-f" style="background-color: orange; margin: 1%;">
        <button data="orange" data-target="#exampleModal" class="btn stretched-link">Orange Department</button>
    </div><br>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stalls</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="stalls">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stalls</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="data">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function(){
  $('.btn').click(function(){
    var id = $(this).attr('data');
        $.ajax({
            url: "controller/market/view_stalls.php",
            method:"POST",
            data:{id:id
            },
            success:function(data){
                $('#stalls').html(data);
                $('#exampleModal').modal('show');
            }
        });
  });

});
</script>