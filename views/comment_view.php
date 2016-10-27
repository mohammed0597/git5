

        <?php
        if (isset($s_video) && is_array($s_video) && count($s_video)): $i = 1;
            foreach ($s_video as $key => $usersvideocomment) {
                ?>


               



                    </div>

                </tr>
                <div>
                    <tr> <label>comment:</label>
        <?php echo $usersvideocomment->comment; ?>

                    </tr>
                </div>

             

<?php } endif; ?>
</html>