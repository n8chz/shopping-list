<?php
 function init_db($mysqli) {
 $query = $mysqli->query(<<<CREATE
  create table if not exists shoplist (
   id integer auto_increment primary key,
   description varchar(64) not null,
   include boolean,
   constraint unique(description))
CREATE
 );
 if ($query) echo "<!-- query set up -->\n";
 else {
  echo "<!-- create table query failed -->\n";
  echo "<!-- error: ".$mysqli->error . "-->\n";
 }
 $query = $mysqli->query(<<<POPULATE
   insert into shoplist(description, include) values
   ('aspartame', false),
   ('b-100', false),
   ('b-12', false),
   ('baking powder', false),
   ('bean sprouts', false),
   ('bell peppers', false),
   ('bird seed brick', false),
   ('black tea', false),
   ('bleach', false),
   ('brown sugar', false),
   ('butter', false),
   ('calcium, w. vitamin d', false),
   ('cardamom, ground', false),
   ('cashews', false),
   ('cheese', false),
   ('cinnamon', false),
   ('clear plastic wrap', false),
   ('cocoa powder', false),
   ('coffee', false),
   ('coffee filters', false),
   ('cold cereal', false),
   ('conditioner', false),
   ('cr2016 watch battery', false),
   ('dish detergent', false),
   ('dry skim milk', false),
   ('dry split peas', false),
   ('flax seed meal', false),
   ('eggs', false),
   ('flour, all purpose', false),
   ('frozen fruit', false),
   ('frozen peas', false),
   ('frozen vegetables', false),
   ('ginger root', false),
   ('glucosamine and chondroitin', false),
   ('go lean', false),
   ('habañero peppers', false),
   ('hand soap', false),
   ('hazel nuts', false),
   ('high gluten flour', false),
   ('hemp protein powder', false),
   ('hot sauce', false),
   ('hydrogen peroxide', false),
   ('kefir', false),
   ('lemons', false),
   ('lime', false),
   ('loperamide', false),
   ('lotion', false),
   ('magnesium', false),
   ('magnifying lens', false),
   ('measuring, cup, 30ml', false),
   ('milk', false),
   ('mixed nuts', false),
   ('motor oil', false),
   ('olive oil', false),
   ('omeprazole', false),
   ('paper towels', false),
   ('paprika', false),
   ('peanut butter', false),
   ('punken pie spice', false),
   ('rechargeable aaa batteries', false),
   ('rhubarb', false),
   ('rice', false),
   ('rubbing alcohol', false),
   ('seepy time', false),
   ('stevia', false),
   ('sugar', false),
   ('tahini', false),
   ('toilet paper', false),
   ('turmeric', false),
   ('whey protein', false),
   ('white tea', false),
   ('yogurt', false),
   ('zinger', false)
POPULATE
 );
}

?>

