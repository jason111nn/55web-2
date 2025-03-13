const newsData = {
    1: { src: './img/01.jpg', title: 'News-1',  text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.' },
    2: { src: './img/02.jpg', title: 'News-2', text: 'tempora quod sunt consectetur sint, soluta possimus similique.' },
    3: { src: './img/03.jpg', title: 'News-3', text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, tempore ' },
    4: { src: './img/04.jpg', title: 'News-4', text: 'tempore eligendi eaque dolor ab voluptas, tempora quod sunt consectetur sint' },
    5: { src: './img/05.jpg', title: 'News-5', text: 'eaque dolor ab voluptas, tempora quod sunt consectetur sint, soluta possimus' },
};
function news(number) {
    const newsItem = newsData[number];
    if (newsItem) {
        $(".np-img").attr('src', newsItem.src);
        $(".np-tital").text(newsItem.title);
        $(".np-text").text(newsItem.text);
    }
}