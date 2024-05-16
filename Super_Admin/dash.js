function container_switcher(j) {
                let block = document.getElementsByClassName("data");
                let btns = document.getElementsByClassName("menu_btn");
                i = 0;
                while (i < block.length) {
                    block[i].style.display = 'none';
                    block[j].style.display = 'inline-block';                    
                   btns[i].style.backgroundColor=' rgba(55, 54, 54, 0.736)';
                   btns[i].style.color='white';
                   btns[j].style.backgroundColor='red';
                   btns[j].style.color='white';
                    i++;
                }
            }
            container_switcher(0)