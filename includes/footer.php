                <div class="text-center" id="footer">
                        <?php echo "<p>Copyright &copy; " . date("Y")." </p>";?>
                </div>
        </div>
        <!--The following is taken from https://getbootstrap.com/docs/4.5/getting-started/introduction/#separate -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" 
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" 
                integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" 
                crossorigin="anonymous"></script>  
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
                $( function() {
                        $( "#dob" ).datepicker( {
                                date_format: "YY-MM-DD",
                                changeMonth: true,
                                changeYear: true,
                                yearRange: "-100:+0"
                        });
                } );
        </script>
  </script>
        </body>
</html>