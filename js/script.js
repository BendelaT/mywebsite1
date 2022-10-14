function hideDiv(option) {
    if (option == "selectedOpt") {
        $('#text').html("")
    }
    if (option == "DVD") {
        $('#dvd').show()
        $('#text').html("Please, provide disc space in MB")
    } else {
        $('#dvd').hide()
    }
    if (option == "Book") {
        $('#book').show()
        $('#text').html("Please, provide weight in KG")
    } else {
        $('#book').hide()
    }
    if (option == "Furniture") {
        $('#furniture').show()
        $('#text').html("Please, provide dimensions in HxWxL")

    } else {
        $('#furniture').hide()

    }
}