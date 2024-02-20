class marksheet {
    constructor(name, classs, total, obtained) {
        this.name = name;
        this.classs = classs;
        this.total = total;
        this.obtained = obtained;
    }
    sheet() {
        console.log(`${this.name} student of ${this.classs} got ${this.obtained} out of ${this.total} in exam.`)
    }
}
let student1 = new marksheet("Areesha", "class 9", 500, 450);
let student2 = new marksheet("Aiman", "class 9", 500, 400);
let student3 = new marksheet("Dania", "class 9", 500, 410);
student1.sheet();
student2.sheet();
student3.sheet();
class subject extends marksheet {
    constructor(name, classs, total, obtained, subject, year) {
        super(name, classs, total, obtained)
        this.subject = subject;
        this.year = year;
    }
    final() {
        console.log(`${this.name}, student of class ${this.classs} got ${this.obtained} out of ${this.total} in ${this.subject} (${this.year})`)
    }
}
let a = new subject("Areesha", 9, 500, 450, "English", "2023");
let b = new subject("Aiman", 9, 500, 400, "English", "2023");
let c = new subject("Dania", 9, 500, 410, "English", "2023");
a.final();
b.final();
c.final();
