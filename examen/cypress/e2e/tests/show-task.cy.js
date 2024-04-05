describe('Show task details by user', () => {
    it('User looks for task details', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.get('.fc-event-title-container').should('be.visible');
        cy.get('.fc-event-title-container').then($taskContainers => {
            const randomIndex = Math.floor(Math.random() * $taskContainers.length);
            const randomTaskContainer = $taskContainers[randomIndex];
            cy.wrap(randomTaskContainer).click();
        });
    })
})
