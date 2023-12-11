# Domain Driven Design Distilled

## Chapter 1: DDD for Me

DDD is a software development approach that emphasizes the importance of understanding the domain of the problem being solved. It advocates for close collaboration between domain experts and software developers to create a shared understanding of the domain and to design software that is aligned with the domain model.

The four key principles of DDD, which help ensure softwar developed with DDD are aligned with the business and that it is easy to understand and maintain, are:

- **Focus on the core domain** - the core domain is the part of the domain that is essential to the business. DDD emphasizes the importance of identifying and modeling the core domain, and of designing software that is focused on the core domain.

- **Model the domain in a way that is meaningful to domain experts** - DDD advocates for using a domain model that is based on the concepts and language of the domain experts. This helps to ensure that the software is aligned with the domain and that it is easy for domain experts to understand and use.

**Use a ubiquitous language** - a ubiquitous language is a shared language that is used by domain experts and software developers to communicate about the domain. DDD emphasizes the importance of developing a ubiquitous language, and of using it consistently throughout the software development process.

## Chapter 2: Strategic Design with Bounded Contexts and the Ubiquitous Language

In DDD, strategic design is focused on aligning the software architecture with the domain model.

The key steps in strategic design are:

- **Identify the core domain** - the core domain is the part of the domain that is essential to the business. DDD emphasizes the importance of identifying and modeling the core domain, and of designing software that is focused on the core domain.

- **Define the subdomains** - a subdomain is a part of the domain that is responsible for a specific business capability. Subdomains are often organized around the core domain, and they may have their own domain models.

- **Define the boundaries** - the boundaries between subdomains are important for ensuring that the software is modular and maintainable. Boundaries are typically defined by identifying the interactions between subdomains.

- **Choose a communication mechanism** - the communication mechanism is the way in which subdomains communicate with each other. There are a number of different communication mechanisms, such as RPC, messaging, and event sourcing.

- **Choose a deployment strategy** - the deployment strategy is the way in which the software is deployed to production. There are a number of different deployment strategies, such as monolithic deployment, microservices, and serverless computing.

Strategic design is an iterative process. As the understanding of the domain evolves, the strategic design may need to be changed.