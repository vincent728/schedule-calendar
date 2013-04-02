<h1>Schedule for <?php echo date('l, d-m-Y',strtotime($day)) ?></h1>
<?php foreach($results->result() as $result): ?>

<strong> Client Name: </strong> <?php echo $result->clientname; ?><br />
<strong>Phone Number #1: </strong> <?php echo $result->phone_one; ?><br />

<?php if ($result->phone_two != ''): ?>
    <strong>Phone Number #2: </strong> <?php echo $result->phone_two; ?><br />
<?php endif; ?> 
    
<?php if ($result->exceptional_directions != ''): ?>
    <strong>Directions: </strong><?php echo $result->exceptional_directions; ?><br /><br><br>
<?php elseif ($result->directions != '' and $result->exceptional_directions == ''): ?>
    <strong>Directions: </strong><?php echo $result->directions; ?><br /><br><br>
<?php endif; ?> 

<?php endforeach; ?>