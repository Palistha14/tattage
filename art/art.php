<!-- <div class="artist">
		<table>
			<tr>
				<td><div class="froartist">
					Aviseq Shakya<br>
					aviseqshakya@gmail.com<br>
					Mr. Shakya<br>
					sbJBSK FB<br>
					Tattoo artist does all kind of tattoo
				</div></td>
				<td><div class="bacartist">
					<a href="design.php"><img src="image/first.jpg" height="300px" width="300px"></a>
				</div></td>
			</tr>
			<tr>
				<td><div class="froartist">
					Bikki Deshar<br>
					bekeymaggot@gmail.com<br>
					bekeymaggot<br>
					sbJBSK FB<br>
					Tattoo artist does all kind of tattoo
				</div></td>
				<td><div class="bacartist">
					<a href="design.php"><img src="image/second.jpg" height="300px" width="300px"></a>
				</div></td>
			</tr>
			<tr>
				<td><div class="froartist">
					Rujen Shakya<br>
					shakyarujen0@gmail.com<br>
					Rujen Shakya<br>
					sbJBSK FB<br>
					Tattoo artist does all kind of tattoo
				</div></td>
				<td><div class="bacartist">
					<a href="design.php"><img src="image/third.jpg" height="300px" width="300px"></a>
				</div></td>
			</tr>
		</table></div> -->


<!-- <div class="card-group">
  <div class="card">
    <img class="card-img-top" src="image/aviseq.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="image/bikki.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="image/rujen.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
 -->





 <div class="col-md-4">
      <div class="thumbnail">
        <a href="design.php" target="_blank">
          <img src="image/aviseq.jpg" style="width:100%">
          <div class="caption">
            <p><h4>$row["ename"]<h4>
            	aviseqshakya@gmail.com
            </p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/nature.jpg" target="_blank">
          <img src="image/bikki.jpg" style="width:100%">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/fjords.jpg" target="_blank">
          <img src="image/rujen.jpg"  style="width:100%">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>




<?php
      $con=mysqli_connect("localhost","root","","tattoo_heritage");
      if(!$con)
      die("Can't connect to the database");
    else{
      $sql="SELECT ename, email, photo FROM tattoo_artist"
      $result=mysqli_query($con,$sql);
      if($result-> num_rows>0){
        $row=mysqli_fetch_assoc($result);
        echo "string";
    ?>








                        /* about*/
  <!-- <div class="card bg-dark text-white">
  <img class="card-img" src="image/logo.jpg" alt="Card image">
  <div class="card-img-overlay">
    <p class="card-text">
      Tattoos and body piercing are done as expressions of independence, for religious or cultural reasons, or to adorn one's body. Tattoo is a permanent picture, pattern, or word on the surface of skin, created by using needles to put colors under the skin.<br/>
      Tattoo Heritage is a place where people come from various places to make tattoo and piercing their body. It is located at Thamel, Kathmandu. It was established on 6th Octobor, 2018.<br/>
      There are 3 tattoo artist who make the tattoo. All the designs are drawn first before the tattoo is made. The design can be cultural, religious, creatures, flowers and much more which is selected by the customers.<br/>
    </p>
  </div>
</div> -->

<!-- <div class="card bg-dark text-white">
  <img class="card-img" src="image/logo.jpg" alt="Card image" height="10%" width="80%"> -->


/*.main{
      background-color: transparent;
      margin: auto;
      width: 60%;
      padding-top: 100px;
      color: red;
    }*/
    /*.bg {*/
      /* The image used */
      /*background-image: url("image/logo.jpg");
      padding: auto 0 auto 0;*/
      /* Full height */
       /*height: 100%;*/
      /* width: 100%;
      background-repeat: no-repeat;*/

      /* Center and scale the image nicely */
      /*background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
*/ 


/*.........................contact..............................*/
.contab{
      
      /*float: left;*/
      text-align: center;
      width: 50%;
      /*background-color: lightblue;*/
      margin-left: 25%;
    }
    .loginf-input {
      width: 285px;
      height: 50px;
      margin-bottom: 25px;
      padding-left:10px;
      font-size: 15px;
      background: #fff;
      border-radius: 4px;
      
    }
    .conside{
      width: 25%;
      float: right;
      /*background-color: lightgray;*/
      
    }
    .tab{
      margin-left: 20%;
    }
    h3{
      
    }
    #map{
      
      margin-left: 28%;
      margin-top: 5%; 
    }
    /*.main{
      margin-left: 20px;
    }*/
    button {     
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 285px;
      }