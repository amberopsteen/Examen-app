describe('User archives task', () => {
    it('User archives a task', () => {
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
        cy.contains('button', 'Archive').click();
    })
})
