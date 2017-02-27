<?php

$page=$_GET['p'];
$new_page=$page++;
?>



<?php

include_once ('backend/items/loren.php');

?>








<?php

echo "

	
    <nav id='pagination'>
      <p>
	  <a id='next_page' href='page.php?p=".$new_page."'></a>
      </p>
    </nav>
		
	
			
";

?>
