const {random} = require("lodash");
const DEFAULT_COLS = 3,
    DEFAULT_ROWS = 3

class Life{


    constructor(cols = DEFAULT_COLS, rows = DEFAULT_ROWS) {
        this.cols = (cols || cols < 3) ? cols : DEFAULT_COLS
        this.rows = (rows || rows < 3) ? rows : DEFAULT_ROWS
        this.place = []
        this.step = 0
        this.interval = null

        for (let row = 0; row < this.rows; row++){
            let arr = [];
            for (let col = 0; col < this.cols; col++){
                arr.push(random(0, 1))
            }
            this.place.push(arr)
        }
    }

    start() {
        $('#life').empty()

        this.interval = setInterval(() => {
            let lifeCount = 0,
                place = JSON.parse(JSON.stringify(this.place))
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
                        this.place[row][col] = 0
                    }
                    if(!isLife && count === 3){
                        this.place[row][col] = 1
                    }
                }
            }

            if(lifeCount === 0 || place.toString() === this.place.toString()) {
                this.#endGame()
            }
        }, 1000)
    }

    #getLifeNeighbourhoods(row = 1, col = 1) {
        let count = 0

        for(let i = -1; i <= 1; i++) {
            for (let j = -1; j <= 1; j++) {
                if (row !== (row + i) &&
                    col !== (col + j) &&
                    this.place[row + i] !== undefined &&
                    this.place[row + i][col +j] !== undefined &&
                    this.place[row + i][col +j] === 1) {
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
}

$(function () {
    $('#btn').on('click', function () {
        let life = new Life($('#cols').val() ,$('#rows').val())
        life.start()
    })
})
