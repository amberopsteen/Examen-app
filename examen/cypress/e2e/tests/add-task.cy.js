describe('Creation of a new task by user', () => {
    it('User creates new task with valid information', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.contains('.fc-daygrid-day-number', '9').click();
        cy.get('input[name="title"]').type('test-task');
        cy.get('input[name="description"]').type('This is a test task');
        cy.get('input[name="start_datetime"]').type('2024-04-10T10:00');
        cy.get('input[name="end_datetime"]').type('2024-04-11T10:00');
        cy.get('button[type="submit"]').click();
    })
    it('User creates new task with invalid information', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.contains('.fc-daygrid-day-number', '7').click();
        cy.get('input[name="title"]').type('test-task-two');
        cy.get('input[name="description"]').type('This is a test task number 2');
        cy.get('input[name="start_datetime"]').type('2024-04-11T11:00');
        cy.get('input[name="end_datetime"]').type('2024-04-11T10:00');
        cy.get('button[type="submit"]').click();
    })
})
