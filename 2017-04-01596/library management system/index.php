
<!DOCTYPE html>

<html>
    <head>
        <title>library system</title>
        <link rel="stylesheet" href="libray.css">
    </head>
    <body>
    <div id="head">
          
          <h1>welcome to online library management system</h1>    
         
         </div>
         <h3> library 2019 </h3>

        <div class="container">
            <form action="insert.php" method="POST" >
                
                <h2>add the book</h2>
                
                <label>title:</label><br>
                <input type="text" name="title"id="title"><br>
                <label>publisher:</label><br>
                <input type="publisher" name="publisher"id="publisher" ><br>
                <label>author:</label><br>
                <input type="author" name="author"id="author"><br>
                <label>category:</label><br>
                <input type="category" name="category"id="category" ><br>
                <label>description:</label><br>
                <input type="text" name="description"id="description"><br>
                <label>date:</label><br>
                <input type="date"name="date"id="date"><br>
                <br>
                <input type="submit"name="submit"value="submit">

            </form>

        </div>
</div>
    </body>
</html> 