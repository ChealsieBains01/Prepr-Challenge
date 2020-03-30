Web App using Laravel

1. Setup new laravel project
2. Set database in .env to sqlite to make a quick db:
DB_CONNECTION=sqlite
3. ran the make:auth command to create a user login interface
4. Imported prepr logo to the welcome page and to the navigation bar:
<div class="title m-b-md">
                    <div><img src="/Prepr_Logo.svg" alt="" style ="max-height: 250px;"></div>
                </div>
5. Created a database with variables for all the important data of the labs:
$table->id();
            $table->string('title');
            $table->float('long');
            $table->float('lat');
            $table->string('address');
            $table->string('city');
            $table->string('country);
            $table->timestamps();
6. Created a controller to send the data from the labs database to the homepage:
class preprlabsController extends Controller
{
    public function list(){
        $labs = PreprLabs::all();

        JavaScript::put([
            'labs' => $labs,
        ]);

        return view('home', [
            'labs' => $labs,
        ]);
    }
}
7. Created a google maps API:
8. Used the google maps API to make a map on the homepage (Using code from the google maps website for a dark mode map -- I thought it looked cool)
9. Stored the longitude, latitude, and title of the labs in php variables on the homepage, and the converted these variables to js.:
<?php
      }
        $lat = array();
        $long = array();
        $title = array();
        foreach($labs as $lab){
          $lat[$lab->id-1] = $lab->lat;
          $long[$lab->id-1] = $lab->long;
          $title[$lab->id-1] = $lab->title;
        }      
      ?>

      <h1>Find a Lab!</h1>   
    <div id="map"></div>
    <script type="text/javascript">
      var la = <?php echo json_encode($lat); ?>;
      var lo = <?php echo json_encode($long); ?>;
      var t = <?php echo json_encode($title); ?>;
      
10. Created markers for each longitude and latitude point on the map, and when you hover over you can see the location title
11. Created a form of cities so that the user can search by city for a lab:
<form method="get" action="">
    <label for="cities">City:</label>
    <select id="cities" name="city">
      <option value="Shanghai">Shanghai</option>
      <option value="Tbilisi">Tbilisi</option>
      <option value="Ahmedabad">Ahmedabad</option>
    </select>
    <input type="submit">
  </form>

     <?php
     $l = array();
      if(isset($_GET['cities'])){
        for($i=0; $i<30; $i++){
          if($_GET['cities']==$lab->city){
            $l[$i] = $lab[$i];
          }
        }
      ?>
12. Working on: Displaying city information for each lab
