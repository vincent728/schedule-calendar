<h1>Schedule for <?php echo date('l, d-m-Y',strtotime($day)) ?></h1>
<?php foreach($results->result() as $result): ?>

<strong> Client Name: </strong> <?php echo $result->clientname; ?><br />
<?php if ($result->contact_person != ''): ?>
<strong> Contact Person: </strong> <?php echo $result->contact_person; ?><br />
<?php endif;?>

<strong>Phone Number #1: </strong> <?php echo $result->phone_one; ?><br />

<?php if ($result->phone_two != ''): ?>
    <strong>Phone Number #2: </strong> <?php echo $result->phone_two; ?><br />
<?php endif; ?> 
    
<?php if ($result->phone_three != ''): ?>
    <strong>Phone Number #3: </strong> <?php echo $result->phone_three; ?><br />
<?php endif; ?>    
    
    <?php if($result->directions !=''):?>
    
    <strong>Directions :</strong><?php echo $result->directions;?><br/>
    <?php endif;?>
    
<?php if ($result->exceptional_directions != ''): ?>
    <strong>Notes: </strong><?php echo $result->exceptional_directions; ?><br/><br/><br/>
<?php endif; ?> 

<?php endforeach; ?>