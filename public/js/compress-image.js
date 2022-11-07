let inputImage = document.getElementById("inputImage")
console.log(inputImage.value)
var w = 800
inputImage.addEventListener("change" , (event) => {
    let imageFile = event.target.files[0]
    let reader = new FileReader
    reader.readAsDataURL(imageFile)

    reader.onload = (event) => {
        let imageUrl = event.target.result

        let image = document.createElement("img");
        image.src = imageUrl

        image.onload = (e) => {
            let canvas = document.createElement('canvas')
            let ratio = w / e.target.width

            // canvas.width = e.target.width
            canvas.width = w

            // canvas.height = e.target.height

            canvas.height = e.target.height * ratio


            const context = canvas.getContext("2d")
            context.drawImage(image, 0, 0, canvas.width,canvas.height)
            let newImageUrl = context.canvas.toDataURL("image/jpeg" , 50)
            // console.log(newImageUrl)

            let compressedFile = urlToFile(newImageUrl)

            let container = new DataTransfer();
            container.items.add(compressedFile);
            inputImage.files = container.files;
            // inputImage.file = compressedFile


            // var compressedImage = document.getElementById("inputImage").files[0]
            // let newImage = document.createElement("img");
            // newImage.src = newImageUrl
            // document.getElementById('wrapper').appendChild(newImage)

        }

    }

})

let urlToFile = (url) => {
    let arr = url.split(",")
    let mime = arr[0].match(/:(.*?);/)[1]
    let data = arr[1]

    let dataStr = atob(data)

    let n = dataStr.length
    let dataArr = new Uint8Array(n)

    while(n--)
    {
        dataArr[n] = dataStr.charCodeAt(n)
    }


    let file = new File([dataArr] , inputImage.value.match(/[^\\/]*$/)[0] , {type: mime})

    console.log(file)

    return file

}
