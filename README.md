You can make simple decisions using this lib. For example you are manager of some basketball team and you want to make profitable transfer
for your club. You should select players by different skills and features.


Here we have aggregation functions:
<ul>
<li>Arithmetic Mean</li>
<li>Weighted Arithmetic Mean</li>
<li>Geometric Mean</li>
<li>Weighted Geometric Mean</li>
<li>Harmonic Mean</li>
<li>Weighted Harmonic Mean</li>
</ul>

Membership functions:
<ul>
<li>Sigmoid</li>
<li>Triangular</li>
</ul>



You need guard for your team and you should pick most profitable player from this table:
<table>
<thead>
<td></td>
<td>Name</td>
<td>Height</td>
<td>Age</td>
<td>Seasons</td>
</thead>
<tr>
<td><img src="http://cdn.sportsoverdose.com/thumbs/manu-ginobili-20-nba-20140103021902.jpg" width="50"/></td>
<td>Manu Ginobili</td>
<td>198</td>
<td>39</td>
<td>15</td>
<tr>
<td><img src="http://cdn.sportsoverdose.com/thumbs/tony-parker-9-nba-20140103021857.jpg" width="50"/></td>
<td>Tony Parker</td>
<td>188</td>
<td>34</td>
<td>16</td>
<tr>
<tr>
<td><img src="http://sports.cbsimg.net/images/basketball/nba/players/170x170/1117748.png" width="50"/></td>
<td>JJ Barea</td>
<td>183</td>
<td>32</td>
<td>10</td>
<tr>
<tr>
<td><img src="http://cdn.sportsoverdose.com/thumbs/sergio-rodriguez-13-nba.jpg" width="50"/></td>
<td>Sergio Rodriguez</td>
<td>191</td>
<td>30</td>
<td>5</td>
<tr>
</table>



</br></br></br>

Let's take <b>Arithmetic Mean</b> as membership function:
</br>
<code>
$aggregationFunction = new ArithmeticMean();
</code>

</br></br></br>


Create <i>features</i>:
</br>

<code>
$height = new Feature("Height", new Trimf(160, 190, 203));
</code>
</br>
<p><font size="2">(best option is 190 in this case)</font></p>
</br>
<code>$age = new Feature("Age", new SNonLinear(10, 30));</code>
</br>
<p><font size="2">(best option is 30 and worst is 10)</font></p>
</br>

<code>$seasons = new Feature("Seasons", new Trimf(0, 5, 20));</code>
</br>
<p><font size="2">(best option is 5)</font></p>
</br>

</br></br></br>
<code>$features = array(
            $height, $age, $seasons
        );</code>
        
        
        
</br></br></br>
Create <i>items</i>:
</br>
<code>
$items = array(</code>
</br>
            &nbsp;&nbsp;<code>new Item("Manu Ginobili", array("Height"=>198, "Age"=>39, "Seasons"=>15)),</code>
            </br>
            &nbsp;&nbsp;<code>new Item("Tony Parker", array("Height"=>188, "Seasons"=>15, "Age"=>34)),</code>
            </br>
            &nbsp;&nbsp;<code>new Item("JJ Barea", array("Height"=> 183, "Age"=>32, "Seasons"=>10)),</code>
            </br>
            &nbsp;&nbsp;<code>new Item("Sergio Rodriguez", array("Height"=>191, "Age"=>30, "Seasons"=>5))</br>
        );</code>


</br></br></br>


<b>...and analyze:</b>
</br></br>
<code>$analyzer = new Analyzer($features, $items, $weightedAggregationFunction);</code>

</br>
<code>$analyzer->analyze();</code>
</br>
</br>
<b>Output would be like this:</b>
<code>
[
  {
    "item_identifier": "Manu Ginobili",
    "score": 0.43905982905983
  },
  {
    "item_identifier": "Tony Parker",
    "score": 0.57
  },
  {
    "item_identifier": "JJ Barea",
    "score": 0.60744444444444
  },
  {
    "item_identifier": "Sergio Rodriguez",
    "score": 0.71641025641026
  }
]
</code>









