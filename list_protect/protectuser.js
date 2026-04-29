
document.querySelectorAll('.read-more-btn').forEach(button => {
    button.addEventListener('click', function () {
        const item = this.closest('.policy-item');
        item.classList.toggle('active');

        if (item.classList.contains('active')) {
            this.innerText = 'THU GỌN';
        } else {
            this.innerText = 'XEM THÊM';
        }
    });
});
