// Create the actions

//Defines what happens when using the controls
function move(a, b){
    if(maze[player.y+a][player.x+b] == 0){
        maze[player.y+a][player.x+b] = p; //players new position
        maze[player.y][player.x] = 0; //players old position
    }else if(maze[player.y+a][player.x+b] == s){
        maze[player.y+a][player.x+b] = p;
        maze[player.y][player.x] = 0;
        plusPoint();
    } else if(maze[player.y+a][player.x+b] == win){
        maze[player.y+a][player.x+b] = p;
        maze[player.y][player.x] = 0;
        tWin = window.setTimeout(function() {
            gameWon();
        }, 2000);
    } else if(maze[player.y+a][player.x+b] == f){
        maze[player.y+a][player.x+b] = p;
        maze[player.y][player.x] = 0;
        tforward = window.setTimeout(function() {
            mazeWon();
        }, 2000);
    }else if(maze[player.y+a][player.x+b] == l){
        maze[player.y+a][player.x+b] = p;
        maze[player.y][player.x] = 0;
        witchlaugh();
        gameOver();
     } else if(maze[player.y+a][player.x+b] == wall){
        thump1();
     }
}

// Point system
function resetPoint() { //ensures every game starts with 0 points
    strawberryPoint = 0;
    document.querySelector("#disply-points").innerHTML = strawberryPoint;
}
resetPoint();

function plusPoint() { //adds points everytime walking into point tile
    strawberryPoint = strawberryPoint + 1;
    document.querySelector("#disply-points").innerHTML = strawberryPoint;
}

// Definer hvad der sker når man vinder og taber spillet
function gameWon(){
    if (maze == maze3){
         maze = mazeWin;
         triumph1();
     }
     grid();
 }
 
 function mazeWon(){
     if(maze == maze1){
         maze = maze2;
     }
     else if(maze2 == maze){
         maze = maze3;
     }
     grid();
 }
 
 function gameOver(){
     maze = mazeOver;
     replace();
 }

 function replace() {
    var btnValue = document.querySelector("#gamebtn");
    btnValue.innerHTML = "Try again";
 }
 
 function timer(){
     window.setTimeout(function() {
         location.reload();
     }, 3000);
 }

 // Moving enemies
setInterval(mEnemy, 500); //How fast enemy walks

let maze1EnemyPositions = [ // where enemy is going to go
    {posY: 6, posX: 3},
    {posY: 5, posX: 3},
    {posY: 4, posX: 3},
    {posY: 3, posX: 3},
    {posY: 4, posX: 3},
    {posY: 5, posX: 3},
    {posY: 6, posX: 3}
];
let maze2EnemyPositions = [
    {posY: 3, posX: 6},
    {posY: 3, posX: 5},
    {posY: 3, posX: 4},
    {posY: 3, posX: 3},
    {posY: 4, posX: 3},
    {posY: 5, posX: 3},
    {posY: 6, posX: 3},
    {posY: 6, posX: 4},
    {posY: 6, posX: 5},
    {posY: 6, posX: 6},
    {posY: 5, posX: 6},
    {posY: 4, posX: 6},
    {posY: 3, posX: 6}
];
let maze3EnemyPositions = [
    {posY: 16, posX: 12},
    {posY: 16, posX: 11},
    {posY: 16, posX: 10},
    {posY: 16, posX: 9},
    {posY: 16, posX: 8},
    {posY: 16, posX: 7},
    {posY: 16, posX: 6},
    {posY: 16, posX: 5},
    {posY: 16, posX: 4},
    {posY: 16, posX: 3},
    {posY: 16, posX: 4},
    {posY: 16, posX: 5},
    {posY: 16, posX: 6},
    {posY: 16, posX: 7},
    {posY: 16, posX: 8},
    {posY: 16, posX: 9},
    {posY: 16, posX: 10},
    {posY: 16, posX: 11},
    {posY: 16, posX: 12}
];


function mEnemy(){ // making enemy move and what happens
    if(maze == maze1){
        if (maze[maze1EnemyPositions[count].posY][maze1EnemyPositions[count].posX] == p){ //checks if witch walks into player
            witchlaugh();
            gameOver();
        }
        maze[maze1EnemyPositions[count].posY][maze1EnemyPositions[count].posX] = l; //moves enemy to new position
        if(count >=1){
            maze[maze1EnemyPositions[count-1].posY][maze1EnemyPositions[count-1].posX]= 0; //makes the tile enemy has left into open tile
        } 
        if(count == 6){ //loops movement
            count = 0;  
        }
        
        count++
        grid();
    } else if(maze == maze2){
        if (maze[maze2EnemyPositions[count].posY][maze2EnemyPositions[count].posX] == p){
            witchlaugh();
            gameOver();
        }
        maze[maze2EnemyPositions[count].posY][maze2EnemyPositions[count].posX] = l; 
        if(count >=1){
            maze[maze2EnemyPositions[count-1].posY][maze2EnemyPositions[count-1].posX]= 0;
        }
        if(count == 12){
            count = 0;  
        }
        count++
        grid();
    } else if(maze == maze3){
        if (maze[maze3EnemyPositions[count].posY][maze3EnemyPositions[count].posX] == p){
            witchlaugh();
            gameOver();
        }
        maze[maze3EnemyPositions[count].posY][maze3EnemyPositions[count].posX] = l; 
        if(count >=1){
            maze[maze3EnemyPositions[count-1].posY][maze3EnemyPositions[count-1].posX]= 0;
        }
        if(count == 18){
            count = 0;  
        }
        count++
        grid();
    }
}