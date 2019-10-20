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
		padding: 2%;
	}
</style>
<center><h1>Tambo Market Map</h1></center>
<div style="display: block;" class="cont">
	<div style="display: flex; border-style: dotted;">
		<div style="display: block; margin: 1%; width: 80%;">
			<div style="border-style: dotted;"><div class="card" id="blue" style="background-color: blue;" data-toggle="modal" data-target="#exampleModal"><a href="#" class="btn stretched-link">Blue Department</a></div></div><br>
			<div style="border-style: dotted;"><div class="card" id="green" style="background-color: green;" data-toggle="modal" data-target="#exampleModal"><a href="#" class="btn stretched-link">Green Department</a></div></div><br>
			<div style="border-style: dotted;"><div class="card" id="yellow" style="background-color: yellow;" data-toggle="modal" data-target="#exampleModal"><a href="#" class="btn stretched-link">Yellow Department</a></div></div><br>
			<div style="border-style: dotted;"><div class="card" id="orange" style="background-color: orange;" data-toggle="modal" data-target="#exampleModal"><a href="#" class="btn stretched-link">Orange Department</a></div></div><br>
		</div>
		<div style="display: block; margin: 1%; text-align: center; width: 20%;">
			<div style="border-style: dotted;"><div class="card" id="blue-s" style="background-color: blue;" data-toggle="modal" data-target="#exampleModal"><a href="#" class="btn stretched-link">Blue Department</a></div></div><br>
			<div style="border-style: dotted;"><div class="card" id="red" style="background-color: red;" data-toggle="modal" data-target="#exampleModal"><a href="#" class="btn stretched-link">Red Department</a></div></div><br>
		</div>
	</div>
	<div class="card" id="orange-f" style="background-color: orange; margin: 1%;"><a href="#" class="btn stretched-link">Orange Department</a></div><br>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stalls</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>I add ra nako ni kung naa koy time hahah</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>