<?php include '../view/header.php'; ?>
<?php include '../view/BasicFormFuncs.php'; ?>

<main>
    <aside>
        <h1>Assign Employee Department</h1>
        <br>
        <a href="../.">Home</a>
        <nav>
    </aside>

    <section>
        <h1><b>Emp No:</b> <?php echo $_SESSION["EmpNo"]; ?></h1>
        <div id="right_column">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="assign_dept_employee"/>
            <input type="hidden" name="emp_no"
                   value="<?php echo $_SESSION["EmpNo"]; ?>" />

            Departments:
            <SELECT name="department">
            <?php foreach ($departments as $dept) : ?>
    
                <OPTION VALUE="<?php echo $dept->getDeptNo();?>"> 
                <?php echo $dept->getDeptName();?>
               
            <?php endforeach; ?>
                
            </SELECT> 

            
            <BR><BR>
        <input type="submit" value="Submit"/>
        </form>

        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>