



<div  style="margin:50px;width:968px;">

 <div class="row">

	<div style="Float:right;">
        <button style="background-color:#f44336;font-size: 13px;padding:12px 28px;border-radius:4px;color:white;opacity:0.6;cursor:not-allowed;" type="button"  data-dismiss="modal" >PAY INVOICE</button>
        <button style="background-color:#008cba;font-size: 13px;padding:12px 28px;border-radius:4px;color:white;" type="button"  onclick="printDiv('printinvoice')">PRINT INVOICE</button>
        
      </div>
      
	  </div>
      </div>
	  
	  
    
	  

		<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
</body>
 
</html>
<?php

	} 
?>



