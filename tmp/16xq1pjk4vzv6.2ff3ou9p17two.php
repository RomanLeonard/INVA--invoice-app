<?php echo $this->render('header.htm',NULL,get_defined_vars(),0); ?>

<?php echo $this->render(@$content,NULL,get_defined_vars(),0); ?>

<?php echo $this->render('footer.htm',NULL,get_defined_vars(),0); ?>