describe('Editing of a task by user', () => {
    it('User edits task', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.get('select[name="filter"]').select('own');
        cy.contains('button', 'Filter').click();
        cy.get('.fc-event-title').then($tasks => {
            const randomIndex = Math.floor(Math.random() * $tasks.length);
            const randomTask = $tasks[randomIndex];
            cy.wrap(randomTask).click();
    });
        cy.contains('button', 'Edit').click();
        cy.get('input[name="title"]').clear().type('testtest');
        cy.get('input[name="description"]').clear().type('This is a test for editing');
        cy.contains('button', 'Edit').click();
    })


    it('User edits task with invalid information', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.get('select[name="filter"]').select('own');
        cy.contains('button', 'Filter').click();
        cy.get('.fc-event-title').then($tasks => {
            const randomIndex = Math.floor(Math.random() * $tasks.length);
            const randomTask = $tasks[randomIndex];
            cy.wrap(randomTask).click();
        });
        cy.contains('button', 'Edit').click();
        cy.get('input[name="title"]').clear().type('testtest');
        cy.get('input[name="description"]').clear().type('This is a test for editing');
        cy.get('input[name="start_datetime"]').clear().type('2024-04-11T11:00');
        cy.get('input[name="end_datetime"]').clear().type('2024-04-11T10:00');
        cy.contains('button', 'Edit').click();
    });
})
