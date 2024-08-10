<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Search Employee</h1>
        <br>
        <a href="../.">Home</a>
        <nav>
    </aside>
    <section>
        <h1>Search Employees</h1>
    
        <?php if (isset($_SESSION["CRUD_Result"]))
        {
            echo $_SESSION["CRUD_Result"];
            unset($_SESSION["CRUD_Result"]);
        }
        ?>

        <form action="." method="post" >
        Last name: <INPUT TYPE="text" NAME="LName" SIZE=5 VALUE="<?php echo htmlspecialchars($LName);?>">
        <input type="hidden" name="action" value="list_employees">
         <input type="submit" value="Search">
        </form>
        <br>
       <form action="." method="post" >
        <input type="hidden" name="action" value="add_employee_form">
         <input type="submit" value="Add employee">
        </form>
        <br>
        
       <?php
        if (($_SESSION["Offset"]-$_SESSION["Limit"])>=0)
        {
        ?>

        <form action="." method="post" style = "display:inline">
                    <INPUT TYPE="hidden" NAME="LName" VALUE="<?php echo htmlspecialchars($LName);?>">

                    <input type="hidden" name="action"
                           value="prev_list_employees">
                    <input type="submit" value="Prev">
        </form>
        <?php } ?>
        
        
       <?php
        if (($_SESSION["Offset"]+$_SESSION["Limit"])<$_SESSION["NumResults"])
        {
        ?>

            <form action="." method="post" style = "display:inline">
                    <INPUT TYPE="hidden" NAME="LName" VALUE="<?php echo htmlspecialchars($LName);?>">
                        <input type="hidden" name="action"
                           value="next_list_employees">
                        <input type="submit" value="Next">
            </form>
        <?php } ?>
       

        
        <table border="1">
            <tr>
                <td>Emp No</td>
                <td>Name</td>
                <td>Hire Date</td>
                <td>Options</td>
            </tr>
            <?php foreach ($employees as $emp) : ?>
            <tr>
                <td>
                <?php echo $emp->getEmpNo(); ?>
                </td>
                <td>
                <?php echo $emp->getFullName(); ?>
                </td>
                <td>
                <?php echo $emp->getHireDate(); ?>
                </td>
                <td>
                 <form action="." method="post">
                    <input type="hidden" name="action"
                           value="view_employee">
                    <input type="hidden" name="emp_no"
                           value=<?php echo $emp->getEmpNo(); ?>>
                    <input type="submit" value="View">
                </form>   
                    
                </td>
            </tr>
            <?php endforeach; ?>
        
        </table>
    </section>
</main>
<?php include '../view/footer.php'; ?>