<!-- Paginador con bootstrap  -->
<?php if($row>=2): ?>
    <div class="">
        <div aria-label="Page navigation example">
        <ul class="pagination">

            <?php
            if ($_GET['page']>1){
            ?>
                <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $_GET['page']-1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
            <?php
            }
            ?>

            <?php for($i=0;$i<$pages;$i++):?>
                <li class='page-item <?php echo $_GET['page']==$i+1 ? 'active' : '' ?>'>
                    <a class='page-link' href='index.php?page=<?php echo $i+1 ?>'>
                        <?php echo $i+1 ?>
                    </a>
                </li>
            <?php endfor ?>
            
            <?php
            if ($_GET['page']<$pages){
            ?>
                <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $_GET['page']+1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            <?php
            }
            ?>
        </ul>
        </div>
    </div>
    <?php endif ?>