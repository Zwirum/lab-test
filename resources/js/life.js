const {random} = require("lodash");
const DEFAULT_COLS = 3,
    DEFAULT_ROWS = 3;

class Life{

    constructor() {
        this.cols = DEFAULT_COLS
        this.rows = DEFAULT_ROWS
        this.place = []
        this.step = 0
        this.interval = null
    }

    init(cols , rows ) {
        $('#life').empty()
        clearInterval(this.interval)

        this.cols = (cols && cols > 2) ? cols : this.cols
        this.rows = (rows && rows > 2) ? rows : this.rows
        this.place = []
        this.step = 0
        this.interval = null

        for (let row = 0; row < this.rows; row++){
            let arr = [];
            for (let col = 0; col < this.cols; col++){
                arr.push(Math.floor(Math.random() * 2))
            }
            this.place.push(arr)
        }

        this.start()
    }

    start() {

        this.interval = setInterval(() => {
            let lifeCount = 0,
                nextStep = this.#arrClon(this.place)
            this.step++
            this.#renderLife()

            for (let row = 0; row < this.rows; row++){
                for (let col = 0; col < this.cols; col++){
                    let count = this.#getLifeNeighbourhoods(row, col),
                        isLife = this.place[row][col] === 1

                    if (isLife) {
                        lifeCount++
                    }

                    if(isLife && !(count === 2 || count === 3)) {
                        nextStep[row][col] = 0
                    }
                    if(!isLife && count === 3){
                        nextStep[row][col] = 1
                    }
                }
            }

            if(lifeCount === 0 || nextStep.toString() === this.place.toString()) {
                this.#endGame()
            }

            this.place = this.#arrClon(nextStep)

        }, 3000)
    }

    #getLifeNeighbourhoods(row , col ) {
        let count = 0

        for(let i = -1; i <= 1; i++) {
            for (let j = -1; j <= 1; j++) {
                let col1 = col + j,
                    row1 = row + i
                if (
                    row1 >= 0 &&
                    col1 >= 0 &&
                    row+'-'+col != row1+'-'+col1 &&
                    this.place[row1] != undefined &&
                    this.place[row1][col1] != undefined &&
                    this.place[row1][col1] === 1
                ) {
                    count++
                }
            }
        }

        return count
    }

    #renderLife() {
        $('#life').append(`${this.step}<hr>`)
        for (let row = 0; row < this.rows; row++){
            for (let col = 0; col < this.cols; col++){
                let isLife = this.place[row][col] === 1
                $('#life').append(`<span>[${ isLife ? 'X' : 'O' }]</span>`)
            }
            $('#life').append('<br>')
        }
    }

    #endGame() {
        $('#life').append('<hr><br>END GAME, M**FAKA')
        clearInterval(this.interval)
    }

    #arrClon(arr) {
        let clone = []
        $.each(arr, function(index, value){
            clone.push(JSON.parse(JSON.stringify(value)))
        })

        return clone
    }
}

$(function () {
    let life = new Life()

    $('#btn').on('click', function () {
        life.init($('#cols').val() ,$('#rows').val())
    })
})
